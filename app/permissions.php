<?php
/**
 * 
 * @authors Casper Lai (casper.lai@sleepingdesign.com)
 * @date    2013-10-20 01:38:39
 * @version 1.0.0.0
 */

// dashboard
Permission::setPermission('admin.index', array('dashboard-index'));
// roles

Permission::setPermission(array('admin.roles.index', 'admin.roles.show'), array('role-index'));
Permission::setPermission(array('admin.roles.create', 'admin.roles.store'), array('role-create'));
Permission::setPermission(array('admin.roles.edit', 'admin.roles.update'), array('role-edit'));

// users
Permission::setPermission(array('admin.users.index', 'admin.users.show'), array('user-index'));
Permission::setPermission(array('admin.users.create', 'admin.users.store'), array('user-create'));
Permission::setPermission(array('admin.users.edit', 'admin.users.update'), array('user-edit'));

// landlords
Permission::setPermission(array('admin.landlords.index', 'admin.landlords.show'), array('landlord-index'));
Permission::setPermission(array('admin.landlords.create', 'admin.landlords.store'), array('landlord-create'));
Permission::setPermission(array('admin.landlords.edit', 'admin.landlords.update'), array('landlord-edit'));