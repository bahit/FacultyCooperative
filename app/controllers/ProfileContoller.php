<?php
class ProfileController extends BaseController
{
    
	public function showPublicProfile($id)
    {
      	$profile = User::find($id);
		//$skillOffer = SkillOffer::whereRaw('user_id = ?', array($id))->get();
		
		//SELECT * FROM skillOffers JOIN skills WHERE skillOffers.skillId = skills.skillId


        $skillOffer =  DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->where('skill_offers.user_id', '=', $id)
            ->get();


		
		$view = View::make('showProfile', array('profile' => $profile,
												 'skillOffer' => $skillOffer));
		
		
		return $view;
        //return $skillOffer;
    }


public function editProfile($id)

    {
       $profile = User::find($id);

/*
        $skills =  DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            //->where('skill_offers.user_id', '=', $id)
            ->get();
*/
        $skills =  Skill::all();
        $view = View::make('editProfile', array('profile' => $profile, 'skills'=>$skills));

	  return $view;
        //return $skills;
	  
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
			

            //Intervention/Image package
            //To resixe images - investigate
            // TODO
            //
            if (Input::hasFile('image'))
            {
                Input::file('image')->move(base_path() .'/public/images/','profile'.$id.'.jpg');
                $user->image = 'profile'.$id.'.jpg';
            }

            $user->save();

            //TODO
            //no validation or error checking
            $profile = User::find($id);
            $view = View::make('editProfile', array('profile' => $profile,'success'=>'yes'));
            return $view;


			//return 'done it- saved some changes to the DB';
            //return base_path() .'/public/images';
            //return $file->getClientOriginalName();

		
    }


	}
	
	public function searchUserByName()
    
    {
       //$user = User::find($id);
	   
	  
	  
    }
	
	
}