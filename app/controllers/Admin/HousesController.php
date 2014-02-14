<?php
namespace Admin;
use \View, \Model, \Validator, \Input, \Redirect;
// Model Exception
use \Illuminate\Database\Eloquent\ModelNotFoundException;
class HousesController extends \BaseController {
	protected $house;
	public function __construct(\House $house)
	{
		View::share('menu_active', 'landlord');
		View::share('h1', '租屋處管理');
		$this->house = $house;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($sn)
	{
		$h1Small = '列表 &amp; 狀態';
		try
		{
			// find house through landlord
			$landlord = \Landlord::where('sn', '=', $sn)->firstOrFail();
			$houses = $landlord->houses;
        	return View::make('admin.houses.index', compact('houses', 'h1Small', 'landlord'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.landlords.index')->with('message', '無此筆資料，請檢查。');
		}
		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($sn)
	{
		$h1Small = '新增';
		$landlord = \Landlord::where('sn', '=', $sn)->firstOrFail();
        return View::make('admin.houses.create', compact('h1Small', 'landlord'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$house = new \House;
		if($house->save())
		{
			return Redirect::route('admin.houses.index', $house->landlord->sn)->with('message', "新增完成");
		}
		else
		{
			return Redirect::route('admin.houses.create', $house->landlord->sn)
				->withInput()
				->withErrors($house->errors()); 
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
        return View::make('houses.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('houses.edit');
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
