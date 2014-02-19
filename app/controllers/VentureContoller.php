<?php
class VentureController extends BaseController
{
    
	public function viewVenture($id)
    {
      	$venture = Venture::find($id);
		$team_leader = User::find($venture->user_id);
		
		
		$view = View::make('viewVenture', array('venture' => $venture, 'team_leader' => $team_leader));
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