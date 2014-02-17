<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('publicProfile/{id}', 'ProfileController@showPublicProfile');

Route::get('editProfile/{id}', 'ProfileController@editProfile');

Route::post('updateProfile/{id}', 'ProfileController@updateProfile');


//Route::resource('profiles', 'ProfileController');