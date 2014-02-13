<?php

class Landlord extends Eloquent {
    protected $table = 'landlords';
	public static $rules = array('key'   =>  'required',
                                'username'  =>  'required',
                                'password'  =>  'required|confirmed',
                                'name'  =>  'required',
                                'zipcode'   =>  'required',
                                'county'    =>  'required',
                                'district'  =>  'required',
                                'address'   =>  'required',
                                'isEnabled' =>  'required'
                                );
    public static $messages =array('key.required'   =>  'id建立失敗。',
                                'username.required'  =>  '請輸入帳號',
                                'password.required'  =>  '請輸入密碼',
                                'password.confirmed'    =>  '密碼比對失敗',
                                'name.required'  =>  '請輸入姓名',
                                'zipcode.required'   =>  '請選擇郵遞區號',
                                'county.required'    =>  '請輸入縣市',
                                'district.required'  =>  '請輸入鄉鎮市區',
                                'address.required'   =>  '請輸入地址',
                                'isEnabled.required' =>  '請選擇狀態'
                                );

    public function getFullAddress()
    {
        return sprintf('[%s]%s%s%s', $this->zipcode, $this->county, $this->district, $this->address);
    }

    public function getStatus()
    {
        return $this->isEnabled ? '啟用' : '停用';
    }

    public function getStatusCss()
    {
        return $this->isEnabled ? 'label-success' : 'label-danger';
    }
}
