<?php
namespace Landlord;
use \View;

class DashboardController extends \BaseController {

	protected $Landlord;
	public function __construct()
	{
		parent::__construct();
		View::share('menu_active', 'dashboard');
		View::share('h1', '大樓資訊');
		$this->Landlord = \Session::get('auth.landlord');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $h1Small = '列表 &amp; 狀態';
		$landlord = \Landlord::find($this->Landlord->id);
		return View::make('landlord.dashboards.index', compact('h1Small', 'landlord'));
	}
}
