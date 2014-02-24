<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
    return View::make('hello');
});

Route::any('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));
// index login
Route::any('login', array('as' => 'index.login', 'uses' => 'LoginController@index'))->before('guest');
// index route group
Route::group(array('before' =>  'auth.index'), function(){
    Route::any('dashboard', array('as' =>  'index.dashboard', 'uses' => 'IndexController@dashboard'));
    // payment
    Route::get('payment', array('as'   =>  'payment.create', 'uses' =>  'Payment\PaypalController@payment'));
    Route::get('payment/success', array('as'   =>  'payment.success', 'uses' =>  'Payment\PaypalController@payment'));
    Route::get('payment/cancel', array('as'   =>  'payment.cancel', 'uses' =>  'Payment\PaypalController@payment'));
});

// landlord login
Route::any('landlord/login', array('as' => 'landlord.login', 'uses' => 'LoginController@landlord'))->before('guest');
// landlord route group
Route::group(array('prefix' => 'landlord', 'before' =>  'auth.landlord'), function(){
    Route::any('dashboard', array('as' =>  'landlord.dashboard', 'uses' => 'Landlord\DashboardController@index'));
});

// admin login
Route::any('admin/login', array('as' => 'admin.login', 'uses' => 'LoginController@admin'))->before('guest');
// admin route
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function(){
    // Dashboard
    Route::any('index', array( 'as' => 'admin.index' ,'uses' => 'Admin\DashboardController@index'));
    // 管理者設定
    Route::resource('users', 'Admin\UsersController');
    Route::get('users/assign/{id}', array('as' => 'admin.users.assign', 'uses' => 'Admin\RoleAssignController@index'));
    Route::post('users/assign/store', array('as' => 'admin.users.assign.store', 'uses' => 'Admin\RoleAssignController@store'));
    // 群組設定
    Route::resource('roles', 'Admin\RolesController');
    Route::get('roles/assign/{id}', array('as' => 'admin.roles.assign', 'uses' => 'Admin\PermissionAssignController@index'));
    Route::post('roles/assign/store', array('as' => 'admin.roles.assign.store', 'uses' => 'Admin\PermissionAssignController@store'));
    // 權限設定
    Route::resource('permissions', 'Admin\PermissionsController');
    // Landlord
    Route::resource('landlords', 'Admin\LandlordsController');
    // Houses
    Route::resource('landlords.houses', 'Admin\HousesController');
    // Rooms
    Route::resource('houses.rooms', 'Admin\RoomsController');
    // Rooms
    Route::resource('rooms.pmus', 'Admin\PmusController');
 });


