<?php

class Message extends Eloquent
{

    public static function validate($input) {

        $rules = array(
            'subject' => 'Required',
            'body'     => 'Required'

        );

        return Validator::make($input, $rules);
    }
}