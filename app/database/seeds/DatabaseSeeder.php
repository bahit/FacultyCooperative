<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('SkillTableSeeder');
		 $this->call('UserTableSeeder');
		 $this->call('SkillOfferTableSeeder');
		 $this->call('SkillWantedTableSeeder');
		 $this->call('TeamMemberTableSeeder');
		 $this->call('VentureTableSeeder');
	}

}

class SkillTableSeeder extends Seeder {

    public function run()
    {
        DB::table('skills')->truncate();

        Skill::create(array('category' => 'IT', 'skill_name' => 'PHP'));
		Skill::create(array('category' => 'IT', 'skill_name' => 'Java'));
		Skill::create(array('category' => 'IT', 'skill_name' => 'C++'));
		Skill::create(array('category' => 'Art', 'skill_name' => 'Dance'));
		Skill::create(array('category' => 'Law', 'skill_name' => 'Patent Law'));
		Skill::create(array('category' => 'Engineering', 'skill_name' => 'Mechanics'));


    }

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
				'email' => 'sthomag@essex.ac.uk', 
				'password' => 'password',
				'name' => 'Sarah Thomas',
                'image' => 'profile1.jpg',
				'bio_details' => 'I am skilled at making tea',
				'career_status' => 'Postgraduate',
				'institution' => 'Essex University',
				'investment_offered' => '0'
				));
				
				
		User::create(array(
				'email' => 'bob@essex.ac.uk', 
				'password' => 'password',
				'name' => 'Dr Bob',
				'bio_details' => 'I am so fantastic at eveything bla bla bla',
				'career_status' => 'Academic',
				'institution' => 'Essex University',
				'investment_offered' => '0'
				));	
				
				
		User::create(array(
				'email' => 'jim@shister.ac.uk', 
				'password' => 'password',
				'name' => 'Jim Lawman',
				'bio_details' => 'I want to help students with legal work in return for equity',
				'career_status' => 'Professional',
				'institution' => 'Shister and Shister Law Firm',
				'investment_offered' => '0'
				));				
		
    }

}

class SkillOfferTableSeeder extends Seeder {
//This is the skills that users can offer
    public function run()
    {
        DB::table('skill_offers')->truncate();

        SkillOffer::create(array('user_id' => '1', 'skill_id' => '1'));
		SkillOffer::create(array('user_id' => '1', 'skill_id' => '2'));
		SkillOffer::create(array('user_id' => '1', 'skill_id' => '3'));
		SkillOffer::create(array('user_id' => '2', 'skill_id' => '4')); //ie. Dr Bob can dance ;-)
		SkillOffer::create(array('user_id' => '3', 'skill_id' => '5'));
		SkillOffer::create(array('user_id' => '3', 'skill_id' => '4'));
		
    }

}

class SkillWantedTableSeeder extends Seeder {
//This is the skills that ventures are looking for
    public function run()
    {
        DB::table('skill_wanteds')->truncate();

        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '1'));
		SkillWanted::create(array('venture_id' => '1', 'skill_id' => '4')); //venture 1 needs a dancer
		
		
    }

}

class TeamMemberTableSeeder extends Seeder {

    public function run()
    {
        DB::table('team_members')->truncate();

        TeamMember::create(array('venture_id' => '1', 'user_id' => '1'));
		TeamMember::create(array('venture_id' => '1', 'user_id' => '2')); 
		
		
    }

}

class VentureTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ventures')->truncate();

        Venture::create(array(
				'title' => 'The IT Dance Company', 
				'user_id' => '1',
                'logo' =>'logo1.jpg',
				'description' => 'A funky fusion of PHP and dance. We are going to be so rich',
				'funding_target' => '300',
				'funding_secured' => '100'
				 ));
				 
		Venture::create(array(
				'title' => 'The Robot Fish', 
				'user_id' => '2',
				'description' => 'A robot fish designed to scare all the other fish in the pond',
				'funding_target' => '800',
				'funding_secured' => '100'
				));		 		
		
		
    }

}