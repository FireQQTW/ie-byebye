<?php

class Pmu extends Eloquent {
    protected $table = 'pmus';
    protected $guarded = array('_token');
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    public static $passwordAttributes  = array('');
    public $autoHashPasswordAttributes = true;
    public $autoPurgeRedundantAttributes = true;

    // rules & messages
    public static $rules = array('name'  =>  'required',
                                'ip'   =>  'required|ip',
                                'isEnabled'  =>  'required'
                                );
    
    public static $customMessages =array('required'    =>  '請輸入 :attribute',
                                          'ip'   =>  '請輸入正確IP',
                                          'integer' =>  '請輸入數字');
    // login rule & message
    public static $loginRules = array('username'    =>  'required',
                                       'password'   =>  'required');
    
    public static $loginMessages = array('username.required' =>  '請輸入帳號',
                                            'password.required' =>  '請輸入密碼');

    // relationship
    public static $relationsData = array(
        'room'  =>  array(self::BELONGS_TO, 'Room')
    );
    // Model Hooks
    public function beforeCreate()
    {
        if(empty($this->sn))
            $this->sn = md5(uniqid());
        return true;
    }
}
