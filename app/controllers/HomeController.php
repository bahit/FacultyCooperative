<?php

class HomeController extends BaseController {



	public function sendMessage($id)
	{
		return View::make('hello');
	}

}