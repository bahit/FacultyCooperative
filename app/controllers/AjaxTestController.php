<?php

class AjaxTestController extends BaseController {



	public function test()
	{

              return View::make('testAjax');

	}

    public function testPost()
    {
        //if (Request::ajax())
        // {



       $user=User::find(Input::get('bid'));
       return $user;
       // }
    }

}