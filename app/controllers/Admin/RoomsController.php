<?php
namespace Admin;
use \View, \Model, \Validator, \Input, \Redirect, \URL;
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
        return View::make('admin.rooms.create', compact('h1Small', 'house'));
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
	 * Display the specified resource.
	 *
	 * @param  string  $house_sn
	 * @param  string  $sn
	 * @return Response
	 */
	public function show($house_sn, $sn)
	{
        $h1Small = '當前搜尋結果<br /><a href="'.URL::route('admin.houses.rooms.index', $house_sn).'">返回列表</a>';
        $room = \Room::where('sn', '=', $sn)->firstOrFail();
        $rooms = array($room);
        $house = $room->house;
        return View::make('admin.rooms.index', compact('h1Small', 'house', 'rooms'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string  $house_sn
	 * @param  string  $sn
	 * @return Response
	 */
	public function edit($house_sn, $sn)
	{
		try
		{
			$h1Small = '修改';
			$room = \Room::where('sn', '=', $sn)->firstOrFail();
			$house = $room->house;
        	return View::make('admin.rooms.edit', compact('h1Small', 'house', 'room'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.houses.rooms.index', $house_sn)->with('message', '無此筆資料，請檢查。');
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  string  $sn
	 * @return Response
	 */
	public function update($house_sn, $sn)
	{
		//
		try
		{
			$room = \Room::where('sn', '=', $sn)->firstOrFail();
			if($room->save())
			{
				return Redirect::route('admin.houses.rooms.show', array($house_sn, $sn))->with('message', "修改完成");
			}
			else
			{
				return Redirect::route('admin.houses.rooms.edit', array($house_sn, $sn))
					->withInput()
					->withErrors($room->errors()); 
			}
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.houses.rooms.index', $house_sn)->with('message', '無此筆資料，請檢查。');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  string  $sn
	 * @return Response
	 */
	public function destroy($house_sn, $sn)
	{
		try
		{
			$room = \Room::where('sn', '=', $sn)->firstOrFail();
			$room->delete();
			return Redirect::route('admin.houses.rooms.index', $house_sn)->with('message', "刪除完成");
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.houses.rooms.index', $house_sn)->with('message', '無此筆資料，請檢查。');
		}
	}

}
