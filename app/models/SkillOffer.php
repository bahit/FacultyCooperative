<?php

class SkillOffer extends Eloquent
{
    public static function getSkillOffer($id)
    {
        $skillOffer = DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->where('skill_offers.user_id', '=', $id)
            ->get();

        return $skillOffer;
    }


    public static function getSkillOfferList($id)
    {
        $skillOfferList = DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->where('skill_offers.user_id', '=', $id)
            ->lists('skill_offers.skill_id');
        // ->get();

        return $skillOfferList;
    }


    public static function searchSkillsOffered($search)
    {
        $skills = DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->whereRaw('skill_name LIKE ?', array("%" . $search . "%"))
            ->select('skills.category', 'skills.skill_name', 'skills.id')
            ->distinct()->get();

        return $skills;
    }

    public static function usersWithSkill($id)
    {
        $usersWithSkill = DB::table('users')
            ->join('skill_offers', 'users.id', '=', 'skill_offers.user_id')
            ->where('skill_offers.skill_id', '=', $id)
            ->get();

        return $usersWithSkill;
    }


    public static function venturesWantingUsersSkills($id)
    {

        $venturesWantingUsersSkills = new ArrayObject();
        $idList = array();

        $skillOfferList = SkillOffer::getSkillOfferList($id);
        if ($skillOfferList) {
            foreach ($skillOfferList as $skill) {

                $ventureW = SkillWanted::venturesWantingSkill($skill);

                foreach ($ventureW as $v) {

                    //avoid duplicate ventures getting listed
                    if (!in_array($v->venture_id, $idList)) {
                        $venturesWantingUsersSkills->append($v);
                        $idList [] = $v->venture_id;
                    }
                }
            }
        }

        //$venturesWantingUsersSkills = array_unique($venturesWantingUsersSkills, SORT_REGULAR);

        return $venturesWantingUsersSkills;
    }


}