<?php
class ProfileController extends BaseController
{

    public function showPublicProfile($id)
    {
        $profile = User::find($id);
        //$skillOffer = SkillOffer::whereRaw('user_id = ?', array($id))->get();

        //SELECT * FROM skillOffers JOIN skills WHERE skillOffers.skillId = skills.skillId


        $skillOffer = DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->where('skill_offers.user_id', '=', $id)
            ->get();


        $view = View::make('showProfile', array('profile' => $profile,
            'skillOffer' => $skillOffer));


        return $view;
        //return $skillOffer;
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
        //This should go in model - see Message model for example
        $rules = array(
            'name' => 'required',
            'bioDetails' => 'required|max:200'
        );

        $validator = Validator::make(Input::all(), $rules);
        ///////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////

        if ($validator->fails()) {

            return Redirect::to('editProfile/' . $id)
                ->withErrors($validator);


        } else {


            $user = User::find($id);
            $user->name = Input::get('name');
            $user->bio_details = Input::get('bioDetails');
            $user->career_status = Input::get('careerStatus');
            $user->institution = Input::get('institution');
            if (Input::get('investmentOffered'))
            {
            $user->investment_offered = 1;}
                else{$user->investment_offered = 0;}


            //Intervention/Image package To resixe images - investigate
            // TODO
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


            //return $user->investment_offered;
            //return $file->getClientOriginalName();


        }


    }


    public function skillOfferChecklistInit($id)

    {
        ///
        //getting checkboxes to correct state

        $skill_offers =  DB::table('skills')
            ->join('skill_offers', 'skills.id', '=', 'skill_offers.skill_id')
            ->where('skill_offers.user_id', '=', $id)
            ->lists('skill_offers.skill_id');
        // ->get();


        $skillsList = Skill::all();
        foreach ($skillsList as $skill) {


            if (in_array($skill->id, $skill_offers)) {
                $checked='checked';
            }
            else{$checked='unchecked';}


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