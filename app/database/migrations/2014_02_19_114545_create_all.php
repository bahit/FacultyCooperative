<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAll extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('users');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('skill_offers');
        Schema::dropIfExists('skill_wanteds');
        Schema::dropIfExists('ventures');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('messages');


        Schema::create('users', function ($t) {
            // auto increment id (primary key)
            $t->increments('id');
            $t->string('email');
            $t->string('image')->default('default.jpg');
            $t->string('password');
            $t->string('name');
            $t->text('bio_details');
            $t->string('career_status');
            $t->string('institution');
            $t->boolean('investment_offered')->default(0);


            // created_at, updated_at DATETIME
            $t->timestamps();
        });


        Schema::create('skills', function ($t) {

            $t->increments('id');
            $t->string('category');
            $t->string('skill_name');
            $t->timestamps();
        });

        Schema::create('skill_offers', function ($t) {

            $t->increments('id');
            $t->integer('user_id');
            $t->integer('skill_id');
            $t->timestamps();
        });

        Schema::create('skill_wanteds', function ($t) {

            $t->increments('id');
            $t->integer('venture_id');
            $t->integer('skill_id');
            $t->timestamps();
        });


        Schema::create('ventures', function ($t) {

            $t->increments('id');
            $t->string('title');
            $t->string('logo')->default('logo.jpg');
            $t->text('description');
            //$t->string('blog_id');  //link to blog - social area
            $t->integer('funding_target');
            $t->integer('funding_secured'); //how much funding has the venture already secured
            $t->timestamps();
        });

        Schema::create('teams', function ($t) {

            //one venture can have many team members
            //1=mentor, 2=leader, 3=member

            $t->increments('id');
            $t->integer('venture_id'); //foreign key
            $t->integer('user_id'); //foreign key
            $t->integer('position')->default(3); //1=mentor, 2=leader, 3=member
            $t->timestamps();
        });


        Schema::create('messages', function ($t) {

            $t->increments('id');
            $t->integer('to_user_id');
            $t->integer('from_user_id');
            $t->string('subject');
            $t->string('body');
            $t->boolean('read_flag')->default(false);;

            $t->timestamps();
        });


    }



}
