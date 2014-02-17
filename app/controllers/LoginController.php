<?php
class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::server("REQUEST_METHOD") == "POST")
		{
			
			$validation = Validator::make(Input::all(), \Room::$loginRules, \Room::$loginMessages);
			if($validation->fails())
				return Redirect::route('index.login')->withErrors($validation)->withInput();

			// find user. login with rooms.
			$username = Input::get('username');
			$password = Input::get('password');
			try
			{
				$room = \Room::where('username', $username)->firstOrFail();
				if($room->isEnabled == false)
					return Redirect::route('index.login')->with('message', '帳號已被停用');

				if(!Hash::check($password, $room->password))
					return Redirect::route('index.login')->with('message', '帳號或密碼錯誤(120)');
				// login success
				Session::put('auth.index', $room);
				return Redirect::route('index.dashboard');
			}
			catch (ModelNotFoundException $e)
			{
				return Redirect::route('index.login')->with('message', '帳號或密碼錯誤(100)');
			}
		}
        return View::make('login.index');
	}

	
	public function admin()
	{

		if(Input::server("REQUEST_METHOD") == "POST")
		{
			$input = Input::all();

			$validation = Validator::make($input, User::$adminRules, User::$adminRuleMessage);

			if($validation->fails())
				return Redirect::route('admin.login')->withErrors($validation)->withInput();

			$authAttempt = array('username'	=>	Input::get('username'),
								 'password'	=>	Input::get('password'));
			$message = "";
			try
			{
				if(Auth::attempt($authAttempt))
					return Redirect::route('admin.index');
				else
					return Redirect::route('admin.login')->withErrors($validation)->withInput();
			}
			catch(Toddish\Verify\UserNotFoundException $e)
			{
				$message = '帳號或密碼錯誤(100)';
			}
			catch(Toddish\Verify\UserUnverifiedException $e)
			{
				$message = '帳號尚未認證';
			}
			catch(Toddish\Verify\UserDisabledException $e)
			{
				$message = '帳號已被停用';
			}
			catch(Toddish\Verify\UserDeletedException $e)
			{
				$message = '帳號或密碼錯誤(110)';
			}
			catch(Toddish\Verify\UserPasswordIncorrectException $e)
			{
				$message = '帳號或密碼錯誤(120)';
			}
			return Redirect::route('admin.login')->withInput()->with('message', $message);
		}
		else
			return View::make('login.admin');
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}
