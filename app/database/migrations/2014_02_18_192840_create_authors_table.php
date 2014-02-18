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
		Schema::create('authors', function($t) {
              // auto increment id (primary key)
              $t->increments('id');

              $t->string('name');
              $t->integer('age')->nullable();
              $t->boolean('active')->default(1);
              $t->integer('role_id')->unsigned();
              $t->text('bio');

              // created_at, updated_at DATETIME
              $t->timestamps();
          });
		  
		  
		  Schema::create('frogs', function($t) {
              // auto increment id (primary key)
              $t->increments('id');

              $t->string('name');
              $t->integer('age')->nullable();
              $t->boolean('active')->default(1);
              $t->integer('role_id')->unsigned();
              $t->text('bio');

              // created_at, updated_at DATETIME
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