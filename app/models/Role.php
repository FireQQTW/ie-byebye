<?php
/**
 * 
 * @authors Casper Lai (casper.lai@sleepingdesign.com)
 * @date    2013-10-20 00:50:08
 * @version 1.0.0.0
 */

use Toddish\Verify\Models\Role as VerifyRole;
class Role extends VerifyRole
{
	public static $roleRules = array('name' => 'required|max:100',
									 'description' => 'max:255');

	public static $roleRulesMessage = array('name.required' => '請輸入名稱',
											'name.max'	=>	'字數最多100字元',
											'description.max'	=>	'字數最多255字元');

	public static $roleAssignRule = array('permissions' => 'required',
										  'role-id'	=>	'required');
	public static $roleAssignRuleMessage = array('permissions.required' => '請選擇權限',
												  'role-id.required' => '群組編號錯誤');

	public static function getLevelArray()
	{
		$array = array();
		for($i = 1; $i <= 10; $i++)
			$array[$i] = $i;
		return $array;
	}
}