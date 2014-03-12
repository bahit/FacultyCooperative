<?php

class Venture extends Eloquent
{
	 //public static $timestamps = false;
    public static function validate($input) {

        $rules = array(
            'title' => 'Required|alpha_spaces|min:2'

        );

        return Validator::make($input, $rules);


}

	
	
    
}