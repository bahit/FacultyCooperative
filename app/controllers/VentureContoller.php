<?php
class VentureController extends BaseController
{

    public function viewVenture($id)
    {
        $venture = Venture::find($id);

        if ($venture == null) {
            App::abort(404);
        }

        $teams = Team::getTeams($id);

        $skillsWanted = SkillWanted::getSkillsWanted($id);

        $auth = VentureController::isAuthUserTeamLeader($id);

        $view = View::make('viewVenture', array('venture' => $venture,
            'skillsWanted' => $skillsWanted,
            'teams' => $teams,
            'auth' => $auth));
        return $view;
        // return $auth;

    }

    public function editVenture($id)

    {


        $auth = VentureController::isAuthUserTeamLeader($id);


        if ($auth) {
            $venture = Venture::find($id);


            $skills = VentureController::skillWantedChecklistInit($id);
            $view = View::make('editVenture', array('venture' => $venture, 'skills' => $skills));

            return $view;
            //return $teamLeaders;


        } else {

            //error message needs improving
            // return 'not a team leader - this needs a proper error response!';
            App::abort(403);

        }

    }

    public function createVenture()

    {


        if (isset(Auth::user()->id)) {
            $id = Auth::user()->id;

            $venture = new Venture;
            $venture->title = Input::get('title');
            $venture->save();

            $team = new Team;
            $team->venture_id = $venture->id;
            $team->user_id = $id;
            $team->position = 2; //ie Team Leader
            $team->save();

            $view = View::make('createVenture', array('venture' => $venture, 'success' => 'success'));
            // return $venture;
            return $view;

        } else {
            return Redirect::to('login');
        }

    }


    public function updateVenture($id)

    {
        //TODO
        //no validation or error checking here - needs adding!!!
        //

        $venture = Venture::find($id);
        $venture->title = Input::get('title');
        $venture->description = Input::get('description');
        $venture->funding_target = Input::get('funding_target');
        $venture->funding_secured = Input::get('funding_secured');


        //Intervention/Image package
        //To resixe images - investigate
        // TODO
        //
        if (Input::hasFile('logo')) {
            Input::file('logo')->move(base_path() . '/public/images/', 'logo' . $id . '.jpg');
            $venture->logo = 'logo' . $id . '.jpg';
        }

        $venture->save();


        //clear user skills as results only sent for boxes checked
        SkillWanted::where('venture_id', '=', $id)->delete();


        $skill_wanteds = Input::get('skillsCB');

        //loops checkbox array and writes to DB

        if ($skill_wanteds) {
            foreach ($skill_wanteds as $skill_id) {
                $skill_wanted = new SkillWanted;

                $skill_wanted->venture_id = $id;
                $skill_wanted->skill_id = $skill_id;

                $skill_wanted->save();
            }
        }

        $skills = VentureController::skillWantedChecklistInit($id);


        $venture = Venture::find($id);
        $view = View::make('editVenture',
            array('venture' => $venture, 'success' => 'yes', 'skills' => $skills));
        return $view;

    }


    public function skillWantedChecklistInit($id)

    {
        ///
        //getting checkboxes to correct state

        $skillWantedList = SkillWanted::skillWantedList($id);


        $skillsList = Skill::all();
        foreach ($skillsList as $skill) {


            if (in_array($skill->id, $skillWantedList)) {
                $checked = 'checked';
            } else {
                $checked = 'unchecked';
            }


            $skills[] = array('id' => $skill->id,
                'skill_name' => $skill->skill_name,
                'category' => $skill->category,
                'checked' => $checked
            );
        }

        return $skills;
        ////

    }

    public function isAuthUserTeamLeader($id)
    {
        $auth = false;

        if (isset(Auth::user()->id)) {
            $authId = Auth::user()->id;


            $teamLeaders = Team::whereRaw('venture_id = ? and position=2', array($id))->get();

            foreach ($teamLeaders as $teamLeader) {
                if ($teamLeader->user_id == $authId) {
                    $auth = true;
                }
            }

        }

        return $auth;
        //return $teamLeaders;

    }

}