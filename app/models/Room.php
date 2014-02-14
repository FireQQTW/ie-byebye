<?php

class Room extends \LaravelBook\Ardent\Ardent {
    protected $table = 'rooms';
	protected $guarded = array('_token');
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    public static $passwordAttributes  = array('password');
    public $autoHashPasswordAttributes = true;
    public $autoPurgeRedundantAttributes = true;
    // rules & messages
    public static $rules = array('name'  =>  'required',
                                'billed'   =>  'required|integer',
                                'isEnabled'  =>  'required'
                                );
    
    public static $customMessages =array('required'    =>  '請輸入 :attribute',
                                          'confirmed'   =>  '密碼比對失敗',
                                          'integer' =>  '請輸入數字');

    // relationship
    public static $relationsData = array(
        'pmus'    => array(self::HAS_MANY, 'Pmu'),
        'house'  =>  array(self::BELONGS_TO, 'House')
    );
    // Model Hooks
    public function beforeCreate()
    {
        if(empty($this->sn))
            $this->sn = md5(uniqid());
        return true;
    }

}
