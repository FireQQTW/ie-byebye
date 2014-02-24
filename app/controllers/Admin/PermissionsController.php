<?php
namespace Admin;
use \View, \Auth, \Permissions, \Input, \Validator, \Redirect, \URL;

class PermissionsController extends \BaseController {
	protected $permission;
	public function __construct(\Permissions $permission)
	{
		parent::__construct();
		View::share('menu_active', 'permission');
		View::share('h1', '權限設定');
		$this->permission = $permission;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = $this->permission->all();
		$h1Small = '列表 &amp; 狀態';
        return View::make('admin.permissions.index', compact('permissions', 'h1Small'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$h1Small = '新增';
        return View::make('admin.permissions.create', compact('h1Small'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Permissions::$permissionRules, Permissions::$permissionRulesMessage);
		if($validation->passes())
		{

			$this->permission->create($input);
			return Redirect::route('admin.permissions.index');
		}
		return Redirect::route('admin.permissions.create')
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
        $h1Small = '當前搜尋結果<br /><a href="'.URL::route('admin.permissions.index').'">返回列表</a>';
		$permission = array($this->permission->find($id));
        return View::make('admin.permissions.index', compact('permissions', 'h1Small'));
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
		$permission = $this->permission->find($id);
		if(is_null($permission))
		{
			return Redirect::route('admin.permissions.index');
		}
        return View::make('admin.permissions.edit', compact('permission', 'h1Small'));
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
		$validation = Validator::make($input, Permissions::$permissionRules, Permissions::$permissionRulesMessage);
		if($validation->passes())
		{
			$permission = $this->permission->find($id);
			$permission->update($input);
			return Redirect::route('admin.permissions.show', $id);
		}
		return Redirect::route('admin.permissions.edit', $id)
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
		$this->permission->find($id)->delete();

		return Redirect::route('admin.permissions.index');
	}

}
