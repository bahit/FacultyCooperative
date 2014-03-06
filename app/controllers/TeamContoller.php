<?php
class TeamController extends BaseController
{
    


    public function editTeam($id)

    {

       // $editPosition=true;
        $venture = Venture::find($id);


        $teams = TeamController::getTeamMembers($id);

        //$teams = DB::table('users')
            //->join('teams', 'users.id', '=', 'teams.user_id')
            // ->where('teams.venture_id', '=', $id) ->get();



        $view = View::make('editTeam', array('venture' => $venture,
           // 'editPosition' => $editPosition,
            'teams' => $teams));


        return $view;
        //return $skills;

    }


    public function editTeamUser($id)

    {


        $position  = Input::get('position');
        $team = Team::find($id);

        $team->position = $position;

        $team->save();

        $venture = Venture::find($team->venture_id);

        $teams = TeamController::getTeamMembers($team->venture_id);


        $view = View::make('editTeam', array('success' => 'success',
                                    'venture'=>$venture,'teams'=>$teams));
           return $view;
        // return $team;
    }



    public function searchUserToAdd($id)  //venture id

    {


        $search  = Input::get('search');

        $users = User::whereRaw('name LIKE ?', array("%".$search."%"))->get();

        $venture = Venture::find($id);

        $teams = TeamController::getTeamMembers($id);


        $view = View::make('editTeam', array('users' => $users,
            'count' => count($users),
            'searchedFor' => $search,
            'venture' => $venture,
            'teams'=>$teams));
        return $view;
        //return $teams;
    }



    public function addUserToTeam($id, $vid)
    {
        //test if already on team
        $test = Team::whereRaw('venture_id > ? and user_id = ?', array($vid, $id))->get();

        if(!$test)
        {
        $team = new Team;
        $team->venture_id = $vid;
        $team->user_id = $id;
        $team->position=3;

        $team->save();
        }

        $venture = Venture::find($vid);

        $teams = TeamController::getTeamMembers($vid);

        $view = View::make('editTeam', array(
            'venture' => $venture,
            'teams'=>$teams));
        return $view;

        //return $test;
    }

    public function getTeamMembers($id)
    {
        $teams = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.user_id')
            ->where('teams.venture_id', '=', $id) ->get();

        return $teams;

    }

}