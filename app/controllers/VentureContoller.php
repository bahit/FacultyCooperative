<?php
class VentureController extends BaseController
{
    
	public function viewVenture($id)
    {
      	$venture = Venture::find($id);


		$teams = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.user_id')
			->where('teams.venture_id', '=', $id)
            ->orderBy('position', 'asc')
            ->get();
			
		$skillsWanted = DB::table('skills')
            ->join('skill_wanteds', 'skills.id', '=', 'skill_wanteds.skill_id')
            ->where('skill_wanteds.venture_id', '=', $id)
            ->get();
		
		
		$view = View::make('viewVenture', array('venture' => $venture,
                           'skillsWanted' => $skillsWanted,
							'teams' => $teams));
		return $view;
        //return $skillsWanted;
    }

    public function editVenture($id)

    {
        $venture = Venture::find($id);


        $skills =  VentureController::skillWantedChecklistInit($id);
        $view = View::make('editVenture', array('venture' => $venture, 'skills'=>$skills));

        return $view;
        //return $skills;

    }

    public function createVenture()

    {

        $venture = new Venture;
        $venture->title  = Input::get('title');

        //TODO
       //write logged in user to team table as leader of newly created venture
        $venture->save();

        $view = View::make('createVenture', array('venture' => $venture, 'success'=>'success'));
       // return $venture;
        return $view;

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




        //clear user skills as results only sent for boxes checked
        SkillWanted::where('venture_id', '=', $id)->delete();

        $skill_wanteds = Input::get('skillsCB');

        //loops checkbox array and writes to DB
        foreach ($skill_wanteds as $skill_id) {
            $skill_wanted = new SkillWanted;

            $skill_wanted->venture_id = $id;
            $skill_wanted->skill_id = $skill_id;

            $skill_wanted->save();
        }


        $skills =  VentureController::skillWantedChecklistInit($id);


        $venture = Venture::find($id);
        $view = View::make('editVenture',
            array('venture' => $venture,'success'=>'yes','skills'=>$skills));
        return $view;

	}


    public function skillWantedChecklistInit($id)

    {
        ///
        //getting checkboxes to correct state

        $skill_wanteds =  DB::table('skills')
            ->join('skill_wanteds', 'skills.id', '=', 'skill_wanteds.skill_id')
            ->where('skill_wanteds.venture_id', '=', $id)
            ->lists('skill_wanteds.skill_id');
        // ->get();


        $skillsList = Skill::all();
        foreach ($skillsList as $skill) {


            if (in_array($skill->id, $skill_wanteds)) {
                $checked='checked';
            }
            else{$checked='unchecked';}


            $skills[] = array('id' => $skill->id,
                'skill_name' => $skill->skill_name,
                'category' => $skill->category,
                'checked' => $checked
            );
        }

        return $skills;
        ////

    }
}