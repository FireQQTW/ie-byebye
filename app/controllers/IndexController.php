<?php

class IndexController extends BaseController {

	protected $Room;
	public function __construct()
	{
		View::share('menu_active', 'landlord');
		View::share('h1', '房間資訊');
		$this->Room = $room = Session::get('auth.index');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('indices.index');
	}

	public function dashboard()
	{
		$h1Small = '列表 &amp; 狀態';
		$room = \Room::find($this->Room->id);
		return View::make('user.dashboards.index', compact('h1Small', 'room'));
	}

}
