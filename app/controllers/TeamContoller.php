<?php
class TeamController extends BaseController
{


    public function editTeam($id)

    {
        $vc = new VentureController;
        $auth = $vc->isAuthUserTeamLeader($id);

        if ($auth) {

        $venture = Venture::find($id);
        $teams = Team::getTeamMembers($id);


        $view = View::make('editTeam', array('venture' => $venture,
            'teams' => $teams));


        return $view;
        }
        else
        {

         //error message needs improving
        return 'not a team leader - this needs a proper error response!';


        }
    }


    public function editTeamUser($id)

    {
        $position = Input::get('position');
        $team = Team::find($id);
        $venture = Venture::find($team->venture_id);

        if (Input::get('delete') == 'delete') {
            $team->delete();
        } else {
            $position = Input::get('position');
            $team->position = $position;

            $team->save();
        }




        $teams = Team::getTeamMembers($venture->id);

        if (Input::get('delete') == 'delete') {
            $team->delete();
        }


        $view = View::make('editTeam', array('success' => 'success',
            'venture' => $venture, 'teams' => $teams));
        return $view;
        //return $delete;
    }


    public function searchUserToAdd($id) //venture id

    {


        $search = Input::get('search');

        $users = User::whereRaw('name LIKE ?', array("%" . $search . "%"))->get();

        $venture = Venture::find($id);

        $teams = Team::getTeamMembers($id);


        $view = View::make('editTeam', array('users' => $users,
            'count' => count($users),
            'searchedFor' => $search,
            'venture' => $venture,
            'teams' => $teams));
        return $view;
        //return $teams;
    }


    public function addUserToTeam($id, $vid)
    {
        //test if already on team
        $test = Team::whereRaw('venture_id = ? and user_id = ?', array($vid, $id))->count();

        if ($test == 0) {
            $team = new Team;
            $team->venture_id = $vid;
            $team->user_id = $id;
            $team->position = 3; //team member

            $team->save();

        }


        $venture = Venture::find($vid);

        $teams = Team::getTeamMembers($vid);

        $view = View::make('editTeam', array(
            'venture' => $venture,
            'teams' => $teams));
        return $view;

        //return $test;
    }

    /*
    public function getTeamMembers($id)
    {
        $teams = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.user_id')
            ->where('teams.venture_id', '=', $id)->get();

        return $teams;

    }

*/
}