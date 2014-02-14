<?php

class Landlord extends \LaravelBook\Ardent\Ardent {
    protected $table = 'landlords';
    protected $guarded = array('_token');
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    public static $passwordAttributes  = array('password');
    public $autoHashPasswordAttributes = true;
    public $autoPurgeRedundantAttributes = true;

	public static $rules = array('username'  =>  'required',
                                'password'  =>  'required|confirmed',
                                'name'  =>  'required',
                                'zipcode'   =>  'required',
                                'county'    =>  'required',
                                'district'  =>  'required',
                                'address'   =>  'required',
                                'isEnabled' =>  'required'
                                );
    public static $customMessages =array('required'    =>  '請輸入 :attribute',
                                          'confirmed'   =>  '密碼比對失敗');
    // Model Hooks
    public function beforeCreate()
    {
        if(empty($this->sn))
            $this->sn = md5(uniqid());
        return true;
    }

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
