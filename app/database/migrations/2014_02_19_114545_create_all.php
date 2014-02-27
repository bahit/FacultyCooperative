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
        Schema::dropIfExists('team_members');


        Schema::create('users', function ($t) {
            // auto increment id (primary key)
            $t->increments('id');
            $t->string('email');
            $t->string('image')->default('default.jpg');
            $t->string('password');
            $t->string('name');
            $t->string('screen_name');
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
            $t->string('user_id'); //creator of venture, team leader
            $t->text('description');
            //$t->string('blog_id');  //link to blog - social area
            $t->integer('funding_target');
            $t->integer('funding_secured'); //how much funding has the venture already secured
            $t->timestamps();
        });

        Schema::create('team_members', function ($t) {

            //one venture can have many team members

            $t->increments('id');
            $t->integer('venture_id'); //foreign key
            $t->integer('user_id'); //foreign key
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

}
