<?php

class MessageController extends BaseController
{


    public function sendMessage($id)
    {


        if (isset(Auth::user()->id)) {

        $user = User::find($id);
        $view = View::make('sendMessage', array('user' => $user));
        return $view;
        }
        else
        {
            return Redirect::to('login');
        }

    }


    public function addMessage($id)
    {


        $validator = Message::validate(Input::all());


        if ($validator->fails()) {

            Input::flash();

            return Redirect::to('sendMessage/' . $id)
                ->withErrors($validator);
        } else {


            $message = new Message;
            $message->to_user_id = $id;
            $message->from_user_id = Auth::user()->id;
            $message->body = Input::get('body');
            $message->subject = Input::get('subject');

            $message->save();

            Input::flash();

            $user = User::find($id);
            $view = View::make('sendMessage', array('user' => $user, 'success' => 'success'));

            return $view;
            // return $m;
        }

    }


    public function readMessage()
    {

        if (isset(Auth::user()->id)) {
            $id = Auth::user()->id;

            $user = User::find($id);


            $readMessages = DB::table('users')
                ->join('messages', 'messages.from_user_id', '=', 'users.id')
                ->where('to_user_id', '=', $id)
                ->orderBy('messages.created_at', 'DESC')
                ->get();


            $view = View::make('readMessage', array('user' => $user
                            , 'readMessages' => $readMessages

            ));
            return $view;


        } else {
            return Redirect::to('login');
        }


    }

    public function messageBodyAjax()
    {
        $message = Message::find(Input::get('bid'));
        $message->read_flag = true;
        $message->save();

        // return $message;
        return;
    }

}