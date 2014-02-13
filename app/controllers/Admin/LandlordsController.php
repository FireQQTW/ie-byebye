<?php
namespace Admin;
use \View, \Model, \Validator, \Input, \Redirect;
class LandlordsController extends \BaseController {
	protected $landlord;
	public function __construct(\Landlord $landlord)
	{
		View::share('menu_active', 'landlord');
		View::share('h1', '房東管理');
		$this->landlord = $landlord;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$landlords = $this->landlord->all();
		$h1Small = '列表 &amp; 狀態';
        return View::make('admin.landlords.index', compact('landlords', 'h1Small'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$h1Small = '新增';
        return View::make('admin.landlords.create', compact('h1Small'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$landlord = new \Landlord;
		
		if($landlord->save())
		{
			return Redirect::route('admin.landlords.index')->with('message', "新增完成");

		}
		else
		{
			return Redirect::route('admin.landlords.create')
				->withInput()
				->withErrors($landlord->errors()); 
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.landlords.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admin.landlords.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
