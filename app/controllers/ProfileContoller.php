<?php
class ProfileController extends BaseController
{
    
	public function showPublicProfile($id)
    {
      	$profile = User::find($id);
		$skillOffer = SkillOffer::whereRaw('user_id = ?', array($id))->get();
		
		//SELECT * FROM skillOffers JOIN skills WHERE skillOffers.skillId = skills.skillId
		
		$view = View::make('showProfile', array('profile' => $profile, 
												 'skillOffer' => $skillOffer));
		
		
		return $view;
    }


public function editProfile($id)

    {
       $profile = User::find($id);
	   
	   $view = View::make('editProfile', array('profile' => $profile));
		
	   
	 
	   return $view;
	  
    }

public function updateProfile($id)
	
    {
		
		
		
		$rules = array(
			'screenName'       => 'required',
			'bioDetails'       => 'required|max:200'
		);
		
		$validator = Validator::make(Input::all(), $rules);
       



		
		if ($validator->fails()) {
			
			return Redirect::to('editProfile/' . $id )
				->withErrors($validator);
				
			
		} else {
			
			
			$user = User::find($id);
			$user->screen_name       = Input::get('screenName');
			$user->bio_details      = Input::get('bioDetails');
			$user->career_status      = Input::get('careerStatus');
			$user->institution      = Input::get('institution');
			$user->investment_offered      = Input::get('investmentOffered');
			
			$user->save();

			
			return 'done it- saved some changes to the DB';
		
    }


	}
	
	public function searchUserByName()
    
    {
       //$user = User::find($id);
	   
	  
	  
    }
	
	
}