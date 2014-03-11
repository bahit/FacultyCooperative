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
        $skills =  DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->whereRaw('skill_name LIKE ?', array("%".$search."%"))
            ->select('skills.category', 'skills.skill_name','skills.id')
            ->distinct()->get();

        return $skills;
    }

    public static function usersWithSkill($id)
    {
        $usersWithSkill =  DB::table('users')
            ->join('skill_offers', 'users.id', '=', 'skill_offers.user_id')
            ->where('skill_offers.skill_id', '=', $id)
            ->get();

        return $usersWithSkill;
    }






}