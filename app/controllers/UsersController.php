<?php

use Illuminate\Support\MessageBag;

class UsersController extends BaseController {

	protected $layout = "main";

	// CSRF (cross-site request forgeries) Filter on post
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		
		// Allow only authorised user to open Dashboard
		$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	/**
	 * Open create user
	 *
	 * 
	 */
	public function postCreate() {
		// Validator parameter $rules are found inside User model
		$validator = Validator::make(Input::all(), User::$rules);
 
    if ($validator->passes()) {
        // validation has passed, save user in DB
	    	$user = new User;
		    $user->name = Input::get('name');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('users/login')->with('message', 'Thanks for registering!');
    } else {
        // validation has failed, display error messages
        return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();    
    }
	}
         
	

	/**
	 * Open register user login
	 *
	 * 
	 */
	public function getRegister() 
	{
    $this->layout->content = View::make('users.register');
	}

	/**
	 * Open view login
	 *
	 * 
	 */
	public function getLogin() {
    $this->layout->content = View::make('users.login');
	}

	/**
	 * Open view logout
	 *
	 * 
	 */
	public function getLogout() {
    Auth::logout();
    return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}



	/**
	 * Signin in user into FacultyCooperative
	 *
	 * 
	 */
	public function postSignin() {
    if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {


    	//return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
        $id = Auth::user()->id;
        $user = User::find($id);


        $teamInvolvement = Team::getTeamInvolvement($id);

        $venturesWantingUsersSkills = SkillOffer::venturesWantingUsersSkills($id);

        $view = View::make('users/dashboard', array('user' => $user,
            'teamInvolvement' => $teamInvolvement,
            'venturesWantingUsersSkills' => $venturesWantingUsersSkills
        ));

        return $view;



        } else {
    	return Redirect::to('users/login')
        ->with('message', 'Your username/password combination was incorrect')
        ->withInput();
		}
	}



    public function dashboard() {

    //return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
            $id = Auth::user()->id;
            $user = User::find($id);


        $teamInvolvement = Team::getTeamInvolvement($id);

        $venturesWantingUsersSkills = SkillOffer::venturesWantingUsersSkills($id);

           $view = View::make('users/dashboard', array('user' => $user,
           'teamInvolvement' => $teamInvolvement,
           'venturesWantingUsersSkills' => $venturesWantingUsersSkills
           ));

        return $view;
        //return $venturesWantingUsersSkills;


    }


	/**
	 * Open Dashboard view
	 * 
	 */
	public function getDashboard() {
     $this->layout->content = View::make('users.dashboard');
	}

	/**
	 * Open view login
	 *
	 * @return Response
	 */
	public function loginAction()
  {
		$errors = new MessageBag();

    if ($old = Input::old("errors"))
    {
        $errors = $old;
    }

    $data = [
        "errors" => $errors
    ];

		if (Input::server("REQUEST_METHOD") == "POST")
    {
        $validator = Validator::make(Input::all(), [
            "email" => "required",
            "password" => "required"
        ]);
        if ($validator->passes())
        {
        	$credentials = [
            "email" => Input::get("email"),
            "password" => Input::get("password")
          ];

          // At the moment this is not working... 
	        if (Auth::attempt($credentials))
	        {
	            return Redirect::route("publicProfile/1");
	        }
        }

        $data["errors"] = new MessageBag([
            "password" => [
                "Username and/or password invalid."
            ]
        ]);

        $data["email"] = Input::get("email");
            return Redirect::route("login")
                ->withInput($data);
    }
    
    return View::make("login", $data);
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('users.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
