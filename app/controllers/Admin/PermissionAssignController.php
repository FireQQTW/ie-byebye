<?php
namespace Admin;

use \View ,\Input, \Validator, \Redirect;

class PermissionAssignController extends \BaseController {
	protected $role;
	protected $permission;
	public function __construct(\Role $role, \Permissions $permission)
	{
		parent::__construct();
		View::share('menu_active', 'roles');
		View::share('h1', '群組設定');
		$this->role = $role;
		$this->permission = $permission;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		// get record
		$role = $this->role->find($id);
		$permissions = $this->permission->all();
		// set permission options
		// array('group name', array())
		$permissionOpeions = array();
		foreach($permissions as $permission)
		{
			$str = mb_substr($permission->description, 0, 2);
			$permissionOpeions[$str][$permission->id] = $permission->description;
		}
		$h1Small = '指定權限';
        return View::make('admin.roles.assign', compact('role', 'permissionOpeions', 'h1Small'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$id = Input::get('role-id');
		$validation = Validator::make($input, \Role::$roleAssignRule, \Role::$roleAssignRuleMessage);

		if($validation->passes())
		{
			$role = $this->role->find($id);
			$permissions = $input['permissions'];
			$role->permissions()->sync($permissions);
			return Redirect::route('admin.roles.index');
		}
		return Redirect::route('admin.roles.assign', $id)
			->withInput()
			->withErrors($validation);
	}

}
