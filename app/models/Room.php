<?php
use \App\Exceptions\NotOwnerException;

class Room extends \LaravelBook\Ardent\Ardent {
    protected $table = 'rooms';
	protected $guarded = array('_token');
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');
    public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    public static $passwordAttributes  = array('password');
    public $autoHashPasswordAttributes = true;
    public $autoPurgeRedundantAttributes = true;

    // rules & messages
    public static $rules = array('name'  =>  'required',
                                'password'  =>  'required|confirmed',
                                'billed'   =>  'required|integer',
                                'isEnabled'  =>  'required'
                                );
    
    public static $customMessages =array('required'    =>  '請輸入 :attribute',
                                          'confirmed'   =>  '密碼比對失敗',
                                          'integer' =>  '請輸入數字');
    // login rule & message
    public static $loginRules = array('username'    =>  'required',
                                       'password'   =>  'required');
    
    public static $loginMessages = array('username.required' =>  '請輸入帳號',
                                            'password.required' =>  '請輸入密碼');

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

    public function beforeSave()
    {
        if(empty(self::$rules['password'])) {
            unset($this->password);
        }
        return true;
    }

    public function checkOwner($id)
    {
        if($this->house->landlord->id != $id)
            throw new NotOwnerException();
        return true;
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
