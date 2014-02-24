<?php
namespace Admin;
use \View, \Auth, \User, \Input, \Validator, \Redirect, \URL;

class UsersController extends \BaseController {

	protected $user;

	public function __construct(User $user)
	{
		parent::__construct();
		View::share('menu_active', 'users');
		View::share('h1', '管理者設定');
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();
		$h1Small = '列表 &amp; 狀態';
        return View::make('admin.users.index', compact('users', 'h1Small'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$h1Small = '新增';
        return View::make('admin.users.create', compact('h1Small'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validation = Validator::make($input, User::$addUserRules, User::$addUserRulesMessage);

		if($validation->passes())
		{

			$this->user->create($input);
			return Redirect::route('admin.users.index');
		}
		return Redirect::route('admin.users.create')
			->withInput()
			->withErrors($validation);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$h1Small = '當前搜尋結果<br /><a href="'.URL::route('admin.users.index').'">返回列表</a>';
		$users = array($this->user->find($id));
        return View::make('admin.users.index', compact('users', 'h1Small'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$h1Small = '修改';
		$user = $this->user->find($id);
		if(is_null($user))
		{
			return Redirect::route('admin.users.index');
		}
        return View::make('admin.users.edit', compact('user', 'h1Small'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, User::$modifyUserRules, User::$modifyUserRulesMessage);
		if($validation->passes())
		{
			$user = $this->user->find($id);
			if(!Input::has('password'))
				unset($input['password']);
			$user->update($input);
			return Redirect::route('admin.users.show', $id);
		}
		return Redirect::route('admin.users.edit', $id)
			->withInput()
			->withErrors($validation);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->find($id)->delete();

		return Redirect::route('admin.users.index');
	}

}
