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



    public static function readMessages($id)
    {
        $readMessages = DB::table('users')
            ->join('messages', 'messages.from_user_id', '=', 'users.id')
            ->where('to_user_id', '=', $id)
            ->orderBy('messages.created_at', 'DESC')
            ->get();

        return $readMessages;
    }


}