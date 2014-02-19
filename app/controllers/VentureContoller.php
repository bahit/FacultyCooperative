<?php
class VentureController extends BaseController
{
    
	public function viewVenture($id)
    {
      	$venture = Venture::find($id);
		$team_leader = User::find($venture->user_id);
		//Don't know how to do this using eloquent models so doing it the old fashioned way - ST
		$team_members = DB::table('users')
            ->join('team_members', 'users.id', '=', 'team_members.user_id')
			
			->where('team_members.venture_id', '=', 1)
            
            ->get();
			
		
		
		
		$view = View::make('viewVenture', array('venture' => $venture, 'team_leader' => $team_leader,
							'team_members' => $team_members));
		return $view;
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