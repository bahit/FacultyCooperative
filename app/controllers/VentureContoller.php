<?php
class VentureController extends BaseController
{
    
	public function viewVenture($id)
    {
      	$venture = Venture::find($id);
		$view = View::make('viewVenture', array('venture' => $venture));
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