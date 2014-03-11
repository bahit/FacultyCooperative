<?php
class ProfileController extends BaseController
{

    public function showPublicProfile($id)
    {
        $profile = User::find($id);

        $skillOffer= SkillOffer::getSkillOffer($id);

        $teamInvolvement = Team::getTeamInvolvement($id);

        $view = View::make('showProfile', array('profile' => $profile,
            'skillOffer' => $skillOffer, 'teamInvolvement' => $teamInvolvement));


        return $view;
        //return $teamInvolvement;
    }


    public function editProfile()

    {
        if (isset(Auth::user()->id)) {
            $id = Auth::user()->id;


            $profile = User::find($id);

            $skills = ProfileController::skillOfferChecklistInit($id);

            $view = View::make('editProfile', array('profile' => $profile, 'skills' => $skills));

            return $view;
        } else {
            return Redirect::to('login');
        }


    }

    public function updateProfile()

    {
        $id = Auth::user()->id;
        //////////////////
        //This should go in MODEL!!!! - see Message model for example
        $rules = array(
            'name' => 'required',
            'bioDetails' => 'required|max:200'
        );

        $validator = Validator::make(Input::all(), $rules);
        ///////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////

        if ($validator->fails()) {

            return Redirect::to('editProfile')
                ->withErrors($validator);


        } else {


            $user = User::find($id);
            $user->name = Input::get('name');
            $user->bio_details = Input::get('bioDetails');
            $user->career_status = Input::get('careerStatus');
            $user->institution = Input::get('institution');
            if (Input::get('investmentOffered')) {
                $user->investment_offered = 1;
            } else {
                $user->investment_offered = 0;
            }


            //
            if (Input::hasFile('image')) {
                Input::file('image')->move(base_path() . '/public/images/', 'profile' . $id . '.jpg');
                $user->image = 'profile' . $id . '.jpg';
            }

            $user->save();

            //TODO
            //no validation or error checking


            //clear user skills as results only sent for boxes checked
            SkillOffer::where('user_id', '=', $id)->delete();

            $skill_offers = Input::get('skillsCB');

            //loops checkbox array and writes to DB
            foreach ($skill_offers as $skill_id) {
                $skill_offer = new SkillOffer;

                $skill_offer->user_id = $id;
                $skill_offer->skill_id = $skill_id;

                $skill_offer->save();
            }


            //////////////
            $skills = ProfileController::skillOfferChecklistInit($id);


            //send current skills list, skill offers and user(profile) back to view
            $profile = User::find($id);
            $view = View::make('editProfile',
                array('profile' => $profile, 'success' => 'yes',
                    'skills' => $skills

                ));
            return $view;




        }


    }


    public function skillOfferChecklistInit($id)

    {


        $skillOfferList = SkillOffer::getSkillOfferList($id);

        $skillsList = Skill::all();
        foreach ($skillsList as $skill) {


            if (in_array($skill->id, $skillOfferList)) {
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


}