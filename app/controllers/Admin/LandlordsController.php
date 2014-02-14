<?php
namespace Admin;
use \View, \Model, \Validator, \Input, \Redirect;
// Model Exception
use \Illuminate\Database\Eloquent\ModelNotFoundException;
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $sn
	 * @return Response
	 */
	public function edit($sn)
	{
		try
		{
			$landlord = $this->landlord->where('sn', '=', $sn)->firstOrFail();
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.landlords.index')->with('message', '無此筆資料，請檢查。');
		}
		$h1Small = '修改';
        return View::make('admin.landlords.edit', compact('h1Small', 'landlord'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $sn
	 * @return Response
	 */
	public function update($sn)
	{
		//
		try
		{
			$landlord = $this->landlord->where('sn', '=', $sn)->firstOrFail();
			// if password empty, would not confirm or update password.
			$landlord::$rules['password'] = (Input::get('password')) ? $landlord::$rules['password'] : '';
			if($landlord->save())
			{
				return Redirect::route('admin.landlords.index')->with('message', "修改完成");
			}
			else
			{
				return Redirect::route('admin.landlords.edit', $sn)
					->withInput()
					->withErrors($landlord->errors()); 
			}
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.landlords.index')->with('message', '無此筆資料，請檢查。');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $key
	 * @return Response
	 */
	public function destroy($sn)
	{
		//
		try
		{
			$landlord = $this->landlord->where('sn', '=', $sn)->firstOrFail();
			$landlord->delete();
			return Redirect::route('admin.landlords.index')->with('message', "刪除完成");
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.landlords.index')->with('message', '無此筆資料，請檢查。');
		}
	}

}
