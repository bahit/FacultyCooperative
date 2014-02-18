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