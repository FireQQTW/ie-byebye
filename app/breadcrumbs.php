<?php
/**
 * 
 * @authors Casper Lai (casper.lai@sleepingdesign.com)
 * @date    2013-10-19 01:10:07
 * @version 1.0.0.0
 */

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.index'));
});

Breadcrumbs::register('dashboard', function($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('Dashboard', route('admin.index'));
});

Breadcrumbs::register('security', function($breadcrumbs) {
	$breadcrumbs->parent('home');
    $breadcrumbs->push('安全性設定', '#');
});
// user
Breadcrumbs::register('admin.users', function($breadcrumbs) {
	$breadcrumbs->parent('security');
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
	$breadcrumbs->parent('security');
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
    $breadcrumbs->push('權限修改', route('admin.permissions.create'));
});

