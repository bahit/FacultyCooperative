<?php
class VentureController extends BaseController
{
    
	public function viewVenture($id)
    {
      	$venture = Venture::find($id);
		$team_leader = User::find($venture->user_id);

		$team_members = DB::table('users')
            ->join('team_members', 'users.id', '=', 'team_members.user_id')
			
			->where('team_members.venture_id', '=', $id)
            
            ->get();
			
		$skillsWanted = DB::table('skills')
            ->join('skill_wanteds', 'skills.id', '=', 'skill_wanteds.skill_id')
            ->where('skill_wanteds.venture_id', '=', $id)
            ->get();
		
		
		$view = View::make('viewVenture', array('venture' => $venture,
                            'team_leader' => $team_leader,
                              'skillsWanted' => $skillsWanted,
							'team_members' => $team_members));
		return $view;
        //return $skillsWanted;
    }

    public function editVenture($id)

    {
        $venture = Venture::find($id);

        /*
                $skills =  DB::table('skills')
                    ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
                    //->where('skill_offers.user_id', '=', $id)
                    ->get();
        */
        $skills =  Skill::all();
        $view = View::make('editVenture', array('venture' => $venture, 'skills'=>$skills));

        return $view;
        //return $skills;

    }




public function updateVenture($id)
	
    {
        //TODO
        //no validation or error checking here - needs adding!!!
        //

        $venture = Venture::find($id);
        $venture->title  = Input::get('title');
        $venture->description  = Input::get('description');
        $venture->funding_target    = Input::get('funding_target');
        $venture->funding_secured  = Input::get('funding_secured');


        //Intervention/Image package
        //To resixe images - investigate
        // TODO
        //
        if (Input::hasFile('logo'))
        {
            Input::file('logo')->move(base_path() .'/public/images/','logo'.$id.'.jpg');
            $venture->logo = 'logo'.$id.'.jpg';
        }

        $venture->save();


        $venture = Venture::find($id);
        $view = View::make('editVenture', array('venture' => $venture,'success'=>'yes'));
        return $view;

	}
}