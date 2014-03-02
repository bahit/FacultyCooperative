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

        //need some authentication - who's logged in for who message is from!!
        //*****************************************************************
        $message->from_user_id = '3';
        $message->body = Input::get('body');
        $message->subject = Input::get('subject');

        $message->save();


        $user = User::find($id);
        $view = View::make('sendMessage', array('user' => $user,'success' => 'success'));
        return $view;
        //return $message;


    }


    public function readMessage($id)
    {


        $user = User::find($id);



        $readMessages = DB::table('users')
            ->join('messages', 'messages.from_user_id', '=', 'users.id')
            ->where('to_user_id', '=', $id)
            ->orderBy('messages.created_at', 'DESC')
            ->get();





        $view = View::make('readMessage', array('user' => $user

        //$view = View::make('readMessageWithAjax', array('user' => $user
            ,'readMessages'=>$readMessages
        //,'message'=>$message
        ));
        return $view;

        //return $message;
       // return $readMessages;


    }

    public function messageBodyAjax()
    {
        $message = Message::find(Input::get('bid'));
        $message->read_flag=true;
        $message->save();

       // return $message;
        return;
    }

}