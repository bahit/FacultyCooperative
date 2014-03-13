<?php

// Catch All function inside UsersController
Route::controller('users', 'UsersController');


Route::any('/register', [
  "as" => "register",
  "uses" => "UsersController@getRegister"
  ]);

Route::any('/login', [
    "as"   => "login",
    "uses" => "UsersController@getLogin"
  ]);

Route::any('/logout', [
    "as"   => "logout",
    "uses" => "UsersController@getLogout"
  ]);

Route::get('dashboard', 'UsersController@dashboard');


Route::get('/', function()
{
	return View::make('home');
});

Route::get('home', function()
{
    return View::make('home');
});


Route::get('hello', function()
{
    return View::make('hello');
});

Route::get('faq', function()
{
return View::make('faq');
});


Route::get('search', function()
{
	return View::make('search');
});


Route::get('createVenture', function()
{
    return View::make('createVenture');
});

Route::post('createVenture', 'VentureController@createVenture');


Route::get('publicProfile/{id}', 'ProfileController@showPublicProfile');

Route::get('editProfile', 'ProfileController@editProfile');

Route::post('updateProfile', 'ProfileController@updateProfile');

Route::get('viewVenture/{id}', 'VentureController@viewVenture');



Route::post('searchUserNames', 'SearchController@searchUserNames');

Route::post('searchVentureTitles', 'SearchController@searchVentureTitles');

Route::get('searchSkills/{id}', 'SearchController@searchSkills');

Route::get('venturesWantingSkill/{id}', 'SearchController@venturesWantingSkill');

//

Route::post('searchSkillsOffered', 'SearchController@searchSkillsOffered');

Route::post('searchSkillsWanted', 'SearchController@searchSkillsWanted');

Route::get('editVenture/{id}', 'VentureController@editVenture');

Route::post('updateVenture/{id}', 'VentureController@updateVenture');



//
Route::get('editTeam/{id}', 'TeamController@editTeam');

Route::post('updateTeam/{id}', 'TeamController@updateTeam');
//

Route::get('sendMessage/{id}', 'MessageController@sendMessage');

Route::post('addMessage/{id}', 'MessageController@addMessage');

Route::get('readMessage', 'MessageController@readMessage');

Route::post('searchUserToAdd/{id}', 'TeamController@searchUserToAdd');

Route::post('editTeamUser/{id}', 'TeamController@editTeamUser');
///


///////////////////////
Route::get('addUserToTeam/{id}/{vid}', 'TeamController@addUserToTeam');


///////////////////////

Route::get('test', 'AjaxTestController@test');

Route::post('testPost', 'AjaxTestController@testPost');

Route::post('messageBodyAjax', 'MessageController@messageBodyAjax');


//Route::get('clicked/{id}', 'SearchController@clicked');
//Route::resource('profiles', 'ProfileController');

Route::get('image2/{size}/{file}','ImageController@getImage');

//Route::get('image2/{size}/{file}', function()
//{
  //  return 'balls';
//});