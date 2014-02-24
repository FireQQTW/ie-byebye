<?php
namespace Admin;

use \View ,\Input, \Validator, \Redirect;

class RoleAssignController extends \BaseController {
	protected $role;
	protected $user;
	public function __construct(\Role $role, \User $user)
	{
		parent::__construct();
		View::share('menu_active', 'users');
		View::share('h1', '管理者設定');
		$this->role = $role;
		$this->user = $user;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$user = $this->user->find($id);
		$roles = $this->role->all();
		$roleOptions = array();
		foreach($roles as $role)
		{
			$roleOptions[$role->id] = $role->name;
		}
		$h1Small = '指定群組';
        return View::make('admin.users.assign', compact('user', 'roleOptions', 'h1Small'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
		$id = Input::get('user-id');
		$validation = Validator::make($input, \User::$userAssignRules, \User::$userAssignRuleMessage);
		if($validation->passes())
		{
			$user = $this->user->find($id);
			$roles = $input['roles'];
			$user->roles()->sync($roles);
			return Redirect::route('admin.users.index');
		}
		return Redirect::route('admin.users.assign', $id)
			->withInput()
			->withErrors($validation);
	}
}
