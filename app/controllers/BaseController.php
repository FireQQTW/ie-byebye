<?php

class BaseController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
		if(Session::has('message')){
			$message = is_array(Session::get('message')) ? Session::get('message') : array(Session::get('message'));
			$message_style = Session::has('style') ? Session::get('style') : 'success';
			View::share('messages', $message);
			View::share('message_style', $message_style);
		}
	}
}