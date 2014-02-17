<?php
class ProfileController extends BaseController
{
    
	public function showPublicProfile($id)
    {
      	
		$view = View::make('showProfile')->with('id', $id);
		return $view;
    }


public function editProfile($id)

    {
       
	   $view = View::make('editProfile')->with('id', $id);
	   return $view;
	   
	   
	  
    }

public function updateProfile($id)
	//public function showProfile()
    {
		
		
		// validate  http://laravel.com/docs/validation
		/*
		$rules = array(
			'screenName'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
        */



		
	//	if ($validator->fails()) {
			//failed
	//	} else {
			// store
			//$id=2;
			$profile = Profile::find($id);
			$profile->screenName       = Input::get('screenName');
			$profile->bioDetails      = Input::get('bioDetails');
			$profile->careerStatus      = Input::get('careerStatus');
			$profile->institution      = Input::get('institution');
			$profile->investmentOffered      = Input::get('investmentOffered');
			
			$profile->save();

			
			return 'done it';
		//}
    }











}