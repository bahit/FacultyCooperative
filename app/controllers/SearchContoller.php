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

        $usersWithSkill = SkillOffer::usersWithSkill($id);

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


        $venturesWantingSkill = SkillWanted::venturesWantingSkill($id);


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

        $skills = SkillOffer::searchSkillsOffered($search);

        $view = View::make('search', array('skills' => $skills,
                                            'searchedSkill' => $search));
        return $view;

        //return $skills;

    }

    public function searchSkillsWanted()

    {


        $search  = Input::get('skillWanted');

        $skillsWanted = SkillWanted::skillsWanted($search);


        $view = View::make('search', array('skillsWanted' => $skillsWanted,
            'searchedSkillWanted' => $search));
        return $view;

        //return $skills;

    }


	
}