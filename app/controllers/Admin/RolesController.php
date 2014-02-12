<?php
namespace Admin;
use \View, \Auth, \Role, \Input, \Validator, \Redirect, \URL;

class RolesController extends \BaseController {
	protected $role;

	public function __construct(\Role $role)
	{
		View::share('menu_active', 'roles');
		View::share('h1', '群組設定');
		$this->role = $role;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->role->all();
		$h1Small = '列表 &amp; 狀態';
        return View::make('admin.roles.index', compact('roles', 'h1Small'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $h1Small = '新增';
        $levels = Role::getLevelArray();
        return View::make('admin.roles.create', compact('h1Small', 'levels'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Role::$roleRules, Role::$roleRulesMessage);
		if($validation->passes())
		{

			$this->role->create($input);
			return Redirect::route('admin.roles.index');
		}
		return Redirect::route('admin.roles.create')
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
        $h1Small = '當前搜尋結果<br /><a href="'.URL::route('admin.roles.index').'">返回列表</a>';
		$roles = array($this->role->find($id));
        return View::make('admin.roles.index', compact('roles', 'h1Small'));
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
		$role = $this->role->find($id);
		if(is_null($role))
		{
			return Redirect::route('admin.roles.index');
		}
		$levels = Role::getLevelArray();
        return View::make('admin.roles.edit', compact('role', 'h1Small', 'levels'));
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
		$validation = Validator::make($input, Role::$roleRules, Role::$roleRulesMessage);
		if($validation->passes())
		{
			$role = $this->role->find($id);
			$role->update($input);
			return Redirect::route('admin.roles.show', $id);
		}
		return Redirect::route('admin.roles.edit', $id)
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
		$this->role->find($id)->delete();

		return Redirect::route('admin.roles.index');
	}


	public function assign($id)
	{
		return View::make('admin.roles.assign');
	}

}
