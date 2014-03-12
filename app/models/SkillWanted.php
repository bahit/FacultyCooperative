<?php

class SkillWanted extends Eloquent
{
    public static function venturesWantingSkill($id)
    {
        $venturesWantingSkill = DB::table('ventures')
            ->join('skill_wanteds', 'ventures.id', '=', 'skill_wanteds.venture_id')
            ->where('skill_wanteds.skill_id', '=', $id)
            ->get();

        return $venturesWantingSkill;
    }


    public static function skillsWanted($search)
    {
        $skillsWanted = DB::table('skills')
            ->join('skill_wanteds', 'skills.id', '=', 'skill_wanteds.skill_id')
            ->whereRaw('skill_name LIKE ?', array("%" . $search . "%"))
            ->select('skills.category', 'skills.skill_name', 'skills.id')
            ->distinct()->get();

        return $skillsWanted;
    }

    public static function getSkillsWanted($id)
    {

        $skillsWanted = DB::table('skills')
            ->join('skill_wanteds', 'skills.id', '=', 'skill_wanteds.skill_id')
            ->where('skill_wanteds.venture_id', '=', $id)
            ->get();

        return $skillsWanted;
    }

    public static function skillWantedList($id)
        //needs to be list for checkbox init - not object
    {
        $skillWantedList = DB::table('skills')
            ->join('skill_wanteds', 'skills.id', '=', 'skill_wanteds.skill_id')
            ->where('skill_wanteds.venture_id', '=', $id)
            ->lists('skill_wanteds.skill_id');

        return $skillWantedList;
    }

}