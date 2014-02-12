<?php

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser
{


	public static $addUserRules = array('username'	=>	'required',
								      'password'	=>	'required|confirmed',
								      'name'	=>	'required',
								      'email'	=>	'required');

	public static $addUserRulesMessage = array('username.required'	=>	'請輸入帳號',
											   'password.required'	=>	'請輸入密碼',
											   'password.confirmed'	=>	'確認密碼失敗',
											   'name.required'	=>	'請輸入名稱',
											   'email.required'	=>	'請輸入Email');

	public static $modifyUserRules = array('username'	=>	'required',
								      'password'	=>	'confirmed',
								      'name'	=>	'required',
								      'email'	=>	'required');

	public static $modifyUserRulesMessage = array('username.required'	=>	'請輸入帳號',
											   'password.confirmed'	=>	'確認密碼失敗',
											   'name.required'	=>	'請輸入名稱',
											   'email.required'	=>	'請輸入Email');


	public static $adminRules = array('username'	=>	'required',
								   	   'password'	=>	'required');
	
	public static $adminRuleMessage = array('username.required'	=>	'請輸入帳號',
											'password.required'	=>	'請輸入密碼');

	public static $userAssignRules = array('roles' => 'required',
											'user-id' => 'required');
	public static $userAssignRuleMessage = array('roles.required' => '請選擇群組',
												 'user-id.required' => '管理者編號錯誤');

	protected $fillable = array('username', 'password', 'name' ,'salt', 'email', 'verified', 'deleted_at', 'disabled');


	public function getStatus()
	{
		$status = '啟用';
		if(!$this->verified)
			$status = '停用';
		if($this->disabled)
			$status = '停用';
		return $status;
	}

	public function getStatusCss()
	{
		$status_css = 'label-success';
		if(!$this->verified)
			$status_css = 'label-danger';
		if($this->disabled)
			$status_css = 'label-danger';

		return $status_css;
	}
}