<?php
class VentureController extends BaseController
{
    
	public function viewVenture($id)
    {
      	$venture = Venture::find($id);
		$team_leader = User::find($venture->user_id);
		//Don't know how to do this using eloquent models so doing it the old fashioned way - ST
		//http://stackoverflow.com/questions/14130338/laravel-really-struggling-to-understand-eloquent - may explainl
		
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
       //TODO
	  
    }

public function updateVenture($id)
	
    {
		
		//TODO

	}
}