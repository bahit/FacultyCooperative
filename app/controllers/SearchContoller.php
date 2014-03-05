<?php
class SearchController extends BaseController
{
    


public function searchUserNames()
	
    {
	$search  = Input::get('search');

    $users = User::whereRaw('name LIKE ?', array("%".$search."%"))->get();

    $view = View::make('search', array('users' => $users,
                            'count' => count($users),
                            'searchedFor' => $search));


            return $view;
	}





    public function searchVentureTitles()

    {

        $search  = Input::get('venture');
        $ventures = Venture::whereRaw('title LIKE ?', array("%".$search."%"))->get();

         $view = View::make('search', array('ventures' => $ventures,
             'count' => count($ventures),
             'searchedVenture' => $search));

         return $view;
       //return $ventures;



    }


    public function searchSkills($id)

    {

       // $search  = Input::get('skill');

//search for user with right skill

//SELECT * FROM users JOIN skill_offers WHERE skill_offers.user_id = users.id AND skill_offers.skill_id=1



        $usersWithSkill =  DB::table('users')
            ->join('skill_offers', 'users.id', '=', 'skill_offers.user_id')
            ->where('skill_offers.skill_id', '=', $id)
            ->get();

        $chosenSkill = Skill::find($id);

        Input::flash();

        $view = View::make('search',
            array('usersWithSkill' => $usersWithSkill,
                'chosenSkill' => $chosenSkill
            ));


        return $view;
        //return $usersWithSkill;



    }



//////////////////

    public function venturesWantingSkill($id)

    {


        $venturesWantingSkill =  DB::table('ventures')
            ->join('skill_wanteds', 'ventures.id', '=', 'skill_wanteds.venture_id')
            ->where('skill_wanteds.skill_id', '=', $id)
            ->get();

        $chosenSkillWanted = Skill::find($id);

        $view = View::make('search',
            array('venturesWantingSkill' => $venturesWantingSkill,
                'chosenSkillWanted' => $chosenSkillWanted
            ));


        return $view;
        //return $venturesWantingSkill;

    }




    public function searchSkillsOffered()

    {


        $search  = Input::get('skill');

        //$skills = Skill::whereRaw('skill_name LIKE ?', array("%".$search."%"))->get();

        $skills =  DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->whereRaw('skill_name LIKE ?', array("%".$search."%"))
           ->select('skills.category', 'skills.skill_name','skills.id')
            ->distinct()->get();




        $view = View::make('search', array('skills' => $skills,
                                            'searchedSkill' => $search));
        return $view;

        //return $skills;

    }

    public function searchSkillsWanted()

    {


        $search  = Input::get('skillWanted');

        $skillsWanted =  DB::table('skills')
            ->join('skill_wanteds', 'skills.id', '=', 'skill_wanteds.skill_id')
            ->whereRaw('skill_name LIKE ?', array("%".$search."%"))
            ->select('skills.category', 'skills.skill_name','skills.id')
            ->distinct()->get();




        $view = View::make('search', array('skillsWanted' => $skillsWanted,
            'searchedSkillWanted' => $search));
        return $view;

        //return $skills;

    }


	
}