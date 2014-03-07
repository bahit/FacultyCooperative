<?php

class Team extends Eloquent
{
    public static function getTeamInvolvement($id)
    {
        $teamInvolvement = DB::table('teams')
            ->join('ventures', 'ventures.id', '=', 'teams.venture_id')
            ->where('teams.user_id', '=', $id)
            ->get();

        return $teamInvolvement;
    }


    public static function getTeams($id)
    {
        $teams = DB::table('users')
            ->join('teams', 'users.id', '=', 'teams.user_id')
            ->where('teams.venture_id', '=', $id)
            ->orderBy('position', 'asc')
            ->get();

        return $teams;
    }

}