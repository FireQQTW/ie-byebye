<?php
namespace Landlord;
use \View, \Redirect;

class RoomsController extends \BaseController {

	protected $Landlord;
	public function __construct()
	{
		View::share('menu_active', 'dashboard');
		View::share('h1', '房間資訊');
		$this->Landlord = \Session::get('auth.landlord');
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
        	return View::make('landlord.rooms.index', compact('h1Small', 'rooms', 'house'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.dashboard')->with('message', '無此筆資料，請檢查。');
		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $house_sn
	 * @param  string  $room_sn
	 * @return Response
	 */
	public function check($house_sn, $room_sn)
	{
		try
		{
			// find house through landlord
			$room = \Room::where('sn', '=', $room_sn)->firstOrFail();
			if($room->save()) {
				$message = $room->isEnabled ? '房間已開啟' : '房間已停用';
				return Redirect::route('landlord.rooms', array($house_sn))->with('message', $message);
			} else {
				return Redirect::route('landlord.rooms', array($house_sn))->with('message', $room->errors());
			}
        	
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '無此筆資料，請檢查。');
		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $house_sn
	 * @param  string  $room_sn
	 * @return Response
	 */
	public function password($house_sn, $room_sn)
	{
		try
		{

		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '無此筆資料，請檢查。');
		}
	}
}
