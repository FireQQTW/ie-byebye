<?php
/**
 * 
 * @authors Casper Lai (casper.lai@sleepingdesign.com)
 * @date    2013-10-19 01:10:07
 * @version 1.0.0.0
 */

Breadcrumbs::register('admin.home', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.index'));
});

Breadcrumbs::register('admin.dashboard', function($breadcrumbs) {
	$breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Dashboard', route('admin.index'));
});

Breadcrumbs::register('admin.security', function($breadcrumbs) {
	$breadcrumbs->parent('admin.home');
    $breadcrumbs->push('安全性設定', '#');
});
// user
Breadcrumbs::register('admin.users', function($breadcrumbs) {
	$breadcrumbs->parent('admin.security');
    $breadcrumbs->push('管理者設定', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.edit', function($breadcrumbs, $user) {
	$breadcrumbs->parent('admin.users');
    $breadcrumbs->push('管理者修改', route('admin.users.edit', $user->id));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs) {
	$breadcrumbs->parent('admin.users');
    $breadcrumbs->push('管理者新增', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.assign', function($breadcrumbs, $user){
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('指定群組', route('admin.users.assign', $user->id));
});
// roles
Breadcrumbs::register('admin.roles', function($breadcrumbs){
	$breadcrumbs->parent('admin.security');
    $breadcrumbs->push('角色設定', route('admin.roles.index'));
});

Breadcrumbs::register('admin.roles.edit', function($breadcrumbs, $role){
	$breadcrumbs->parent('admin.roles');
    $breadcrumbs->push('角色修改', route('admin.roles.edit', $role->id));
});

Breadcrumbs::register('admin.roles.create', function($breadcrumbs){
	$breadcrumbs->parent('admin.roles');
    $breadcrumbs->push('角色新增', route('admin.roles.create'));
});

Breadcrumbs::register('admin.roles.assign', function($breadcrumbs, $role){
    $breadcrumbs->parent('admin.roles');
    $breadcrumbs->push('指定權限', route('admin.roles.assign', $role->id));
});

// permission
Breadcrumbs::register('admin.permissions', function($breadcrumbs){
    $breadcrumbs->parent('security');
    $breadcrumbs->push('權限設定', route('admin.permissions.index'));
});

Breadcrumbs::register('admin.permissions.edit', function($breadcrumbs, $permission){
    $breadcrumbs->parent('admin.permissions');
    $breadcrumbs->push('權限修改', route('admin.permissions.edit', $permission->id));
});

Breadcrumbs::register('admin.permissions.create', function($breadcrumbs){
    $breadcrumbs->parent('admin.permissions');
    $breadcrumbs->push('權限新增', route('admin.permissions.create'));
});

// landlord
Breadcrumbs::register('admin.landlords', function($breadcrumbs){
    $breadcrumbs->push('房東管理', route('admin.landlords.index'));
});

Breadcrumbs::register('admin.landlords.edit', function($breadcrumbs, $landlord){
    $breadcrumbs->parent('admin.landlords');
    $breadcrumbs->push('房東修改', route('admin.landlords.edit', $landlord->sn));
});

Breadcrumbs::register('admin.landlords.create', function($breadcrumbs){
    $breadcrumbs->parent('admin.landlords');
    $breadcrumbs->push('房東新增', route('admin.landlords.create'));
});

// houses
Breadcrumbs::register('admin.landlords.houses', function($breadcrumbs, $landlord){
    $breadcrumbs->parent('admin.landlords');
    $breadcrumbs->push('租屋處管理', route('admin.landlords.houses.index', $landlord->sn));
});
Breadcrumbs::register('admin.landlords.houses.create', function($breadcrumbs, $landlord){
    $breadcrumbs->parent('admin.landlords.houses', $landlord);
    $breadcrumbs->push('租屋處新增', route('admin.landlords.houses.create'));
});
Breadcrumbs::register('admin.landlords.houses.edit', function($breadcrumbs, $landlord){
    $breadcrumbs->parent('admin.landlords.houses', $landlord);
    $breadcrumbs->push('租屋處新增', route('admin.landlords.houses.edit'));
});

// rooms
Breadcrumbs::register('admin.houses.rooms', function($breadcrumbs, $house){
    $breadcrumbs->parent('admin.landlords.houses', $house->landlord);
    $breadcrumbs->push('房間管理', route('admin.houses.rooms.index', $house->sn));
});
Breadcrumbs::register('admin.houses.rooms.create', function($breadcrumbs, $house){
    $breadcrumbs->parent('admin.houses.rooms', $house);
    $breadcrumbs->push('房間新增', route('admin.houses.rooms.create'));
});
Breadcrumbs::register('admin.houses.rooms.edit', function($breadcrumbs, $house){
    $breadcrumbs->parent('admin.houses.rooms', $house);
    $breadcrumbs->push('房間修改', route('admin.houses.rooms.edit'));
});

// pmus
Breadcrumbs::register('admin.rooms.pmus', function($breadcrumbs, $room){
    $breadcrumbs->parent('admin.houses.rooms', $room->house);
    $breadcrumbs->push('控制器管理', route('admin.rooms.pmus.index', $room->house));
});
Breadcrumbs::register('admin.houses.rooms.create', function($breadcrumbs, $room){
    $breadcrumbs->parent('admin.houses.rooms', $room->house);
    $breadcrumbs->push('控制器新增', route('admin.rooms.pmus.create'));
});
Breadcrumbs::register('admin.houses.rooms.edit', function($breadcrumbs, $room){
    $breadcrumbs->parent('admin.houses.rooms', $room->house);
    $breadcrumbs->push('控制器修改', route('admin.rooms.pmus.edit'));
});


/* user */
Breadcrumbs::register('index.home', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('index.dashboard'));
});

Breadcrumbs::register('index.dashboard', function($breadcrumbs) {
    $breadcrumbs->parent('index.home');
    $breadcrumbs->push('Dashboard', route('index.dashboard'));
});