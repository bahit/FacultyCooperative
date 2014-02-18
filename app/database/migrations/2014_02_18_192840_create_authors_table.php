<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		
		  
		  
		  Schema::create('profiles', function($t) {
              // auto increment id (primary key)
              $t->increments('id');

              $t->string('screen_name');
              $t->text('bio_details');
              $t->string('career_status');
              $t->string('institution');
			  $t->boolean('investment_offered')->default(0);
             

              // created_at, updated_at DATETIME
              $t->timestamps();
          });
		  
		  
		  Schema::create('skills', function($t) {
             
              $t->increments('id');
			  $t->string('category');
              $t->text('skill_name');
          	  $t->timestamps();
          });
		  
		   Schema::create('skill_offers', function($t) {
             
              $t->increments('id');
			  $t->integer('profile_id');
              $t->integer('skill_id');
          	  $t->timestamps();
          });
		  
		  
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('authors', function(Blueprint $table)
		{
			//
		});
	}

}