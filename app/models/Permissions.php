<?php
/**
 * 
 * @authors Casper Lai (casper.lai@sleepingdesign.com)
 * @date    2013-10-20 18:09:53
 * @version 1.0.0.0
 */

use Toddish\Verify\Models\Permission as VerifyPermission;
class Permissions extends VerifyPermission {
    
    public static $permissionRules = array('name' => 'required|max:100',
									 'description' => 'max:255');

	public static $permissionRulesMessage = array('name.required' => '請輸入權限代碼',
											'name.max'	=>	'字數最多100字元',
											'description.max'	=>	'字數最多255字元');
}