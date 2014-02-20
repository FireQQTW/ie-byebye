<?php
namespace Admin;
use \View, \Model, \Validator, \Input, \Redirect;
// Model Exception
use \Illuminate\Database\Eloquent\ModelNotFoundException;
class PmusController extends \BaseController {
	public function __construct()
	{
		View::share('menu_active', 'landlord');
		View::share('h1', '控制器管理');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $room_sn
	 * @return Response
	 */
	public function index($room_sn)
	{
		$h1Small = '列表 &amp; 狀態';
		try
		{
			// find house through landlord
			$room = \Room::where('sn', '=', $room_sn)->firstOrFail();
			$pmus = $room->pmus;
        	return View::make('admin.pmus.index', compact('h1Small', 'room', 'pmus'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.houses.rooms.index', $room_sn)->with('message', '無此筆資料，請檢查。');
		}
		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  string  $room_sn
	 * @return Response
	 */
	public function create($room_sn)
	{
		$h1Small = '新增';
		$room = \Room::where('sn', '=', $room_sn)->firstOrFail();
        return View::make('admin.pmus.create', compact('h1Small', 'room'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  string  $rooms_sn
	 * @return Response
	 */
	public function store($rooms_sn)
	{
		//
		$pmu = new \Pmu;
		if($pmu->save())
		{
			return Redirect::route('admin.rooms.pmus.index', $rooms_sn)->with('message', "新增完成");
		}
		else
		{
			return Redirect::route('admin.rooms.pmus.create', $rooms_sn)
				->withInput()
				->withErrors($pmu->errors()); 
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string  $room_sn
	 * @param  string  $sn
	 * @return Response
	 */
	public function edit($room_sn, $sn)
	{
		try
		{
			$h1Small = '修改';
			$pmu = \Pmu::where('sn', '=', $sn)->firstOrFail();
			$room = $pmu->room;
        	return View::make('admin.pmus.edit', compact('h1Small', 'room', 'pmu'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.rooms.pmus.index', $room_sn)->with('message', '無此筆資料，請檢查。');
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  string  $room_sn
	 * @param  string  $sn
	 * @return Response
	 */
	public function update($room_sn, $sn)
	{
		//
		try
		{
			$pmu = \Pmu::where('sn', '=', $sn)->firstOrFail();
			if($pmu->save())
			{
				return Redirect::route('admin.rooms.pmus.index', $pmu->room->sn)->with('message', "修改完成");
			}
			else
			{
				return Redirect::route('admin.rooms.pmus.edit', array($room_sn, $sn))
					->withInput()
					->withErrors($room->errors()); 
			}
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.rooms.pmus.index', $room_sn)->with('message', '無此筆資料，請檢查。');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  string  $room_sn
	 * @param  string  $sn
	 * @return Response
	 */
	public function destroy($room_sn, $sn)
	{
		try
		{
			$pmu = \Pmu::where('sn', '=', $sn)->firstOrFail();
			$pmu->delete();
			return Redirect::route('admin.rooms.pmus.index', $room_sn)->with('message', "刪除完成");
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('admin.rooms.pmus.index', $room_sn)->with('message', '無此筆資料，請檢查。');
		}
	}

}
