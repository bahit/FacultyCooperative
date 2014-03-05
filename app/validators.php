<?php
/* app/validators.php  */

/*
*  Custom validation for enabling alpha and space validation since Laravel don't have a built in one
*  It matches unicode characters as well.
*
*  Custom error message added to lang/en/validation.php
*  This file is loaded at start/global.php
*
*  Reference: http://blog.elenakolevska.com/laravel-alpha-validator-that-allows-spaces/
*/

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[\pL\s]+$/u', $value);
});

/*
* add the validators.php file in start/global.php: require app_path().'/validators.php'
* and use it as usual:  $rules = array('name' => 'required|alpha_spaces',);
*/