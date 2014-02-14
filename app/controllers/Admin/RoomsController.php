<?php
namespace Admin;
use \View, \Model, \Validator, \Input, \Redirect;
// Model Exception
use \Illuminate\Database\Eloquent\ModelNotFoundException;
class RoomsController extends \BaseController {
	public function __construct()
	{
		View::share('menu_active', 'landlord');
		View::share('h1', '房間管理');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $house_sn
	 * @return Response
	 */
	public function index($house_sn)
	{
		$h1Small = '列表 &amp; 狀態';
		try
		{
			// find house through landlord
			$house = \House::where('sn', '=', $house_sn)->firstOrFail();
			$rooms = $house->rooms;
        	return View::make('admin.rooms.index', compact('h1Small', 'rooms', 'house'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.landlords.houses.index', $house_sn)->with('message', '無此筆資料，請檢查。');
		}
		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  string  $house_sn
	 * @return Response
	 */
	public function create($house_sn)
	{
		$h1Small = '新增';
		$house = \House::where('sn', '=', $house_sn)->firstOrFail();
        return View::make('admin.houses.create', compact('h1Small', 'house'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  string  $house_sn
	 * @return Response
	 */
	public function store($house_sn)
	{
		//
		$room = new \Room;
		if($room->save())
		{
			return Redirect::route('admin.houses.rooms.index', $house_sn)->with('message', "新增完成");
		}
		else
		{
			return Redirect::route('admin.houses.rooms.create', $house_sn)
				->withInput()
				->withErrors($room->errors()); 
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string  $landlord_sn
	 * @param  string  $sn
	 * @return Response
	 */
	public function edit($landlord_sn, $sn)
	{
		try
		{
			$h1Small = '修改';
			$house = \House::where('sn', '=', $sn)->firstOrFail();
			$landlord = $house->landlord;
        	return View::make('admin.houses.edit', compact('h1Small', 'landlord', 'house'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.landlords.houses.index', array($landlord_sn))->with('message', '無此筆資料，請檢查。');
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  string  $sn
	 * @return Response
	 */
	public function update($landlord_sn, $sn)
	{
		//
		try
		{
			$house = \House::where('sn', '=', $sn)->firstOrFail();
			if($house->save())
			{
				return Redirect::route('admin.landlords.houses.index', $house->landlord->sn)->with('message', "修改完成");
			}
			else
			{
				return Redirect::route('admin.landlords.houses.edit', $sn, $house->landlord->sn)
					->withInput()
					->withErrors($house->errors()); 
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
	 * @param  string  $sn
	 * @return Response
	 */
	public function destroy($landlord_sn, $sn)
	{
		try
		{
			$house = \House::where('sn', '=', $sn)->firstOrFail();
			$house->delete();
			return Redirect::route('admin.landlords.houses.index', $landlord_sn)->with('message', "刪除完成");
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.landlords.houses.index', $landlord_sn)->with('message', '無此筆資料，請檢查。');
		}
	}

}
