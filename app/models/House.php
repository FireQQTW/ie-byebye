<?php

class House extends \LaravelBook\Ardent\Ardent {
    protected $table = 'houses';
	protected $guarded = array('_token');
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    public static $passwordAttributes  = array('');
    public $autoHashPasswordAttributes = true;
    public $autoPurgeRedundantAttributes = true;

    public static $rules = array('zipcode'   =>  'required',
                                'county'    =>  'required',
                                'district'  =>  'required',
                                'address'   =>  'required'
                                );
    public static $customMessages =array('required'    =>  '請輸入 :attribute');
    // relationship
    public static $relationsData = array(
        'rooms'    => array(self::HAS_MANY, 'Room'),
        'landlord'  =>  array(self::BELONGS_TO, 'Landlord')
    );
    // Model Hooks
    public function beforeCreate()
    {
        if(empty($this->sn))
            $this->sn = md5(uniqid());
        return true;
    }
}
