<?php 
namespace Admin;
use \View, \Auth;

class DashboardController extends \BaseController {

	public function __construct()
	{
		View::share('menu_active', 'index');
		View::share('h1', 'Dashboard');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$h1Small = 'overview &amp; stats';
        return View::make('admin.dashboards.index', compact('h1Small'));
	}
}
