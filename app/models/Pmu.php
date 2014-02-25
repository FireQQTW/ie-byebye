<?php

class Pmu extends \LaravelBook\Ardent\Ardent {
    protected $table = 'pmus';
    protected $guarded = array('_token');
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('');
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
    public static $loginRules = array('username'    =>  'required');
    
    public static $loginMessages = array('username.required' =>  '請輸入帳號');

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

    public function getStatus()
    {
        return $this->isEnabled ? '啟用' : '停用';
    }

    public function getStatusCss()
    {
        return $this->isEnabled ? 'label-success' : 'label-danger';
    }

    public function getUsedValue()
    {
        $type = $this->room->getBilledType();
        switch($type){
            case 'walt':
                $value = $this->use_w;
                break;
            case 'time':
                $value = $this->use_minute;
                break;
            default:
                $value = '尚未設定';
                break;
        }
        return $value;
    }

    public function getLastValue()
    {
        $type = $this->room->getBilledType();
        switch($type){
            case 'walt':
                $value = $this->last_w;
                break;
            case 'time':
                $value = $this->last_minute;
                break;
            default:
                $value = '尚未設定';
                break;
        }
        return $value;
    }
}
