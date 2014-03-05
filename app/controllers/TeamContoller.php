<?php
class TeamController extends BaseController
{
    


    public function editTeam($id)

    {

        $editPosition=true;
        $venture = Venture::find($id);



        $teams = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.user_id')
             ->where('teams.venture_id', '=', $id) ->get();



        $view = View::make('editTeam', array('venture' => $venture,
            'editPosition' => $editPosition,
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




        $view = View::make('editTeam', array('success' => 'success'));
           return $view;
        // return $team;
    }



    public function searchUserToAdd()

    {


        $search  = Input::get('search');

        $users = User::whereRaw('name LIKE ?', array("%".$search."%"))->get();

        $view = View::make('editTeam', array('users' => $users,
            'count' => count($users),
            'searchedFor' => $search));
        return $view;
       // return $users;
    }



    public function addUserToTeam($id)
    {
        $team = new Team;
        $team->venture_id = '';
        $team->user_id = '';
        $team->pisition=3;

       // $team->save();

        return 'done';
    }

}