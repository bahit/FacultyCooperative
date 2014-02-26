<?php



Route::get('/', function()
{
	return View::make('home');
});

Route::get('home', function()
{
    return View::make('home');
});






Route::get('search', function()
{
	return View::make('search');
});


Route::get('publicProfile/{id}', 'ProfileController@showPublicProfile');

Route::get('editProfile/{id}', 'ProfileController@editProfile');

Route::post('updateProfile/{id}', 'ProfileController@updateProfile');

Route::get('viewVenture/{id}', 'VentureController@viewVenture');



Route::post('searchUserNames', 'SearchController@searchUserNames');

Route::post('searchVentureTitles', 'SearchController@searchVentureTitles');

Route::get('searchSkills/{id}', 'SearchController@searchSkills');

Route::get('venturesWantingSkill/{id}', 'SearchController@venturesWantingSkill');

//

Route::post('searchSkillsOffered', 'SearchController@searchSkillsOffered');

Route::post('searchSkillsWanted', 'SearchController@searchSkillsWanted');

//Route::get('clicked/{id}', 'SearchController@clicked');
//Route::resource('profiles', 'ProfileController');

//searchSkillsWanted