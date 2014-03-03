<?php
class TeamController extends BaseController
{
    


    public function editTeam($id)

    {
        $venture = Venture::find($id);

        $team_leader = User::find($venture->user_id);

        $team_members = DB::table('users')
            ->join('team_members', 'users.id', '=', 'team_members.user_id')
             ->where('team_members.venture_id', '=', $id) ->get();



        $view = View::make('editTeam', array('venture' => $venture,
            'team_leader' => $team_leader,
            'team_members' => $team_members));


        return $view;
        //return $skills;

    }




public function updateTeam($id)
	
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



}