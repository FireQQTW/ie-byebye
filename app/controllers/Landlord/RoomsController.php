<?php
namespace Landlord;
use \View, \Redirect;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use \App\Exceptions\NotOwnerException;
class RoomsController extends \BaseController {

	protected $Landlord;
	public function __construct()
	{
		parent::__construct();
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
        $h1Small = '列表';
        try
		{
			// find house through landlord
			$house = \House::where('sn', '=', $house_sn)->firstOrFail();
			$house->checkOwner($this->Landlord->id);
			$rooms = $house->rooms;

        	return View::make('landlord.rooms.index', compact('h1Small', 'rooms', 'house'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.dashboard')->with('message', '無此筆資料，請檢查。');
		}
		catch (NotOwnerException $e)
		{
			return Redirect::route('landlord.dashboard')->with('message', '資料授權失敗。');
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
			// cancel update password
			$room::$rules['password'] = '';
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
	public function edit($house_sn, $room_sn)
	{
		$h1Small = '變更密碼';
		try
		{
			$room = \Room::where('sn', '=', $room_sn)->firstOrFail();
			$room->checkOwner($this->Landlord->id);
			return View::make('landlord.rooms.edit', compact('h1Small', 'room'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '無此筆資料，請檢查。');
		}
		catch (NotOwnerException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '資料授權失敗。');
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $house_sn
	 * @param  string  $room_sn
	 * @return Response
	 */
	public function update($house_sn, $room_sn)
	{
		try
		{
			$room = \Room::where('sn', '=', $room_sn)->firstOrFail();
			$room->checkOwner($this->Landlord->id);
			// if password empty, would not confirm or update password.
			$room::$rules['password'] = (\Input::get('password')) ? $room::$rules['password'] : '';
			if($room->save())
			{
				return Redirect::route('landlord.rooms', array($house_sn))->with('message', "修改完成");
			}
			else
			{
				return Redirect::route('landlord.rooms.edit', array($house_sn, $room_sn))
					->withInput()
					->withErrors($room->errors()); 
			}
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '無此筆資料，請檢查。');
		}
		catch (NotOwnerException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '資料授權失敗。');
		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $house_sn
	 * @param  string  $room_sn
	 * @return Response
	 */
	public function bill($house_sn, $room_sn)
	{
		$h1Small = '計價設定';
		try
		{
			$room = \Room::where('sn', '=', $room_sn)->firstOrFail();
			$room->checkOwner($this->Landlord->id);
			return View::make('landlord.rooms.bill', compact('h1Small', 'room'));
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '無此筆資料，請檢查。');
		}
		catch (NotOwnerException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '資料授權失敗。');
		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $house_sn
	 * @param  string  $room_sn
	 * @return Response
	 */
	public function bill_update($house_sn, $room_sn)
	{
		try
		{
			$room = \Room::where('sn', '=', $room_sn)->firstOrFail();
			$room->checkOwner($this->Landlord->id);
			// if password empty, would not confirm or update password.
			$room::$rules['password'] = (\Input::get('password')) ? $room::$rules['password'] : '';
			$billValue = \Input::get('billValue');
			$billType = \Input::get('billType');
			// manual validation.
			$manualValidationErrors = array();
			if(empty($billType))
				$manualValidationErrors[] = '請選擇計價方式';
			if($billValue <= 0 || empty($billValue))
				$manualValidationErrors[] = '請輸入費用';
			if(count($manualValidationErrors) > 0)
				return Redirect::route('landlord.rooms.edit.bill', array($house_sn, $room_sn))
					->withInput()
					->with('message', $manualValidationErrors)
					->with('style', 'error');

			// combine bill value and type to json
	        $billJson = json_encode(array("value" =>  $billValue,   "radio" =>  $billType));
	        $room->BilledTypeJsonData = $billJson;
			if($room->save())
			{
				return Redirect::route('landlord.rooms', array($house_sn))->with('message', "修改完成");
			}
			else
			{
				return Redirect::route('landlord.rooms.edit.bill', array($house_sn, $room_sn))
					->withInput()
					->withErrors($room->errors()); 
			}
		}
		catch (ModelNotFoundException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '無此筆資料，請檢查。');
		}
		catch (NotOwnerException $e)
		{
			return Redirect::route('landlord.rooms', array($house_sn))->with('message', '資料授權失敗。');
		}
	}
}
