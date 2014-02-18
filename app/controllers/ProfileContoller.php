<?php
class ProfileController extends BaseController
{
    
	public function showPublicProfile($id)
    {
      	$profile = Profile::find($id);
		$skillOffer = SkillOffer::whereRaw('profile_id = ?', array($id))->get();
		
		//SELECT * FROM skillOffers JOIN skills WHERE skillOffers.skillId = skills.skillId
		
		$view = View::make('showProfile', array('profile' => $profile, 
												 'skillOffer' => $skillOffer));
		
		
		return $view;
    }


public function editProfile($id)

    {
       $profile = Profile::find($id);
	   
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
			
			
			$profile = Profile::find($id);
			$profile->screenName       = Input::get('screenName');
			$profile->bioDetails      = Input::get('bioDetails');
			$profile->careerStatus      = Input::get('careerStatus');
			$profile->institution      = Input::get('institution');
			$profile->investmentOffered      = Input::get('investmentOffered');
			
			$profile->save();

			
			return 'done it';
		
    }


	}
}