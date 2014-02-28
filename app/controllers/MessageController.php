<?php

class MessageController extends BaseController {



	public function sendMessage($id)
	{


        $user = User::find($id);
        $view = View::make('sendMessage', array('user' => $user));
        return $view;


	}



    public function addMessage($id)
    {

       $message = new Message;
        $message->to_user_id = $id;

        //need some authentication - who's logged in for who message is from
        $message->from_user_id = '1';
        $message->content = Input::get('content');

        $message->save();


        $user = User::find(1);
        $view = View::make('sendMessage', array('user' => $user,'success' => 'success'));


        return $view;


    }

}