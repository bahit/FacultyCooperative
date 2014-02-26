<?php
class SearchController extends BaseController
{
    


public function searchUserNames()
	
    {
		
		

			$search  = "%".Input::get('search')."%";

           $users = User::whereRaw('name LIKE ?', array($search))->get();



        $view = View::make('search', array('users' => $users));


            return $view;
		



	}





    public function searchVentureTitles()

    {



        $search  = "%".Input::get('venture')."%";

        $ventures = Venture::whereRaw('title LIKE ?', array($search))->get();



        $view = View::make('search', array('ventures' => $ventures));


       return $view;
       //return $ventures;



    }


    public function searchSkills()

    {

        $search  = Input::get('skill');

//search for user with right skill

//SELECT * FROM users JOIN skill_offers WHERE skill_offers.user_id = users.id AND skill_offers.skill_id=1



        $usersWithSkill =  DB::table('users')
            ->join('skill_offers', 'users.id', '=', 'skill_offers.user_id')
            ->where('skill_offers.skill_id', '=', $search)
            //->join('orders', 'users.id', '=', 'orders.user_id')
            ->get();
           // ->select('users.id', 'users.name');


        $view = View::make('search', array('usersWithSkill' => $usersWithSkill));


        return $view;



    }
	

	
	
}