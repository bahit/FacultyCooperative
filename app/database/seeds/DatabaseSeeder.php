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
        DB::table('skills')->delete();

        Skill::create(array('category' => 'IT', 'skill_name' => 'PHP'));
		Skill::create(array('category' => 'IT', 'skill_name' => 'Java'));
		Skill::create(array('category' => 'IT', 'skill_name' => 'C++'));
		Skill::create(array('category' => 'Art', 'skill_name' => 'Dance'));
    }

}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
				'email' => 'sthomag@essex.ac.uk', 
				'password' => 'password',
				'name' => 'Sarah Thomas',
				'screen_name' => 'Sarah T',
				'bio_details' => 'I am skilled at making tea',
				'career_status' => 'Postgraduate',
				'institution' => 'Essex University',
				'investment_offered' => '0'
				));
				
				
		User::create(array(
				'email' => 'bob@essex.ac.uk', 
				'password' => 'password',
				'name' => 'Dr Bob',
				'screen_name' => 'Bob Man',
				'bio_details' => 'I am so fantastic at eveything bla bla bla',
				'career_status' => 'Academic',
				'institution' => 'Essex University',
				'investment_offered' => '0'
				));		
		
    }

}

class SkillOfferTableSeeder extends Seeder {

    public function run()
    {
        DB::table('skill_offers')->delete();

        SkillOffer::create(array('profile_id' => '1', 'skill_id' => '1'));
		SkillOffer::create(array('profile_id' => '1', 'skill_id' => '2'));
		SkillOffer::create(array('profile_id' => '1', 'skill_id' => '3'));
		SkillOffer::create(array('profile_id' => '2', 'skill_id' => '4')); //ie. Dr Bob can dance ;-)
		
    }

}

class SkillWantedTableSeeder extends Seeder {

    public function run()
    {
        DB::table('skill_wanteds')->delete();

        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '1'));
		SkillWanted::create(array('venture_id' => '1', 'skill_id' => '4')); //venture 1 needs a dancer
		
		
    }

}

class TeamMemberTableSeeder extends Seeder {

    public function run()
    {
        DB::table('team_members')->delete();

        TeamMember::create(array('venture_id' => '1', 'user_id' => '1'));
		TeamMember::create(array('venture_id' => '1', 'user_id' => '2')); 
		
		
    }

}

class VentureTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ventures')->delete();

        Venture::create(array(
				'title' => 'The IT Dance Company', 
				'user_id' => '1',
				'description' => 'A funky fusion of PHP and dance. We are going to be so rich',
				'funding_target' => '300',
				'funding_secured' => '100'
				 ));		
		
		
    }

}