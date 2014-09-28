<?php

class Register extends CActiveRecord
{
    public $salt;
    public $create_time;
    public $setpswd;
    public $acpswd;
    public $verifyCode;
    public $trueName;

    public function tableName()
    {
        return 'tbl_user';
    }

    public function rules()
    {

        return array(
            array('name, trueName, setpswd, acpswd, verifyCode', 'required','message'=>'{attribute}不能为空'),
            array('name', 'length', 'max'=>100),
            array('name', 'unique','message'=>'{value} 已经被注册'),
            array('trueName', 'length', 'max'=>15),
            array('setpswd','length','min'=>6,'max'=>16,'tooLong'=>'密码长度超过16字符','tooShort'=>'密码长度不能低于6个字符'),
            array('acpswd','compare', 'compareAttribute'=>'setpswd','message'=>'确认密码必须与设置密码相同'),
            // verifyCode needs to be entered correctly
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'message'=>'验证码错误!'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => '登录名',
            'trueName' => '真实姓名',
            'setpswd'=>'设置密码',
            'acpswd'=>'确认密码',
            'create_time' => '注册时间',
            'verifyCode'=>'验证码',
        );
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function init(){
        $this->salt = $this->getSalt();
        $this->create_time = time();
    }

    private function getSalt($len=8){
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $salt = '';
        for($i=0;$i<$len;$i++) $salt .= $str[mt_rand(0,61)];
        return $salt;
    }

}