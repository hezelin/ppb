<?php

/*
 * 搜索模型
 *
 */
class Search extends CFormModel
{
	public $dateRang;               // 日期范围
	public $platform = 'all';       // 平台
    public $level;                  // 等级开始

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
//			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('level', 'match', 'pattern' => '/^[0-9\- ]+$/','message'=>'等级范围必须是数字与"-"'),
			// password needs to be authenticated
//			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
            'dateRang'=>'日期范围',
			'platform'=>'平台',
            'level'=>'等级范围',
		);
	}

    public function getWhere()
    {
        $where = '1=1';
        if(isset($_REQUEST['Search']) && $_REQUEST['Search'])
        {
            if(isset($_REQUEST['Search']['dateRang']) && $_REQUEST['Search']['dateRang']){
                list($day1,$day2) = explode(' - ',$_REQUEST['Search']['dateRang']);
                $where .= ' and `ctime` between '.strtotime($day1).' and '.(strtotime($day2) + 86399);
            }

            if(isset($_REQUEST['Search']['platform']) && $_REQUEST['Search']['platform']){

                switch($_REQUEST['Search']['platform']){
                    case 'all': break;
                    case 'ios': $where .= ' and agent_id < 1000';
                                break;
                    case 'android': $where .= ' and agent_id > 1000';
                                break;
                    default : $where .= ' and agent_id='.$_REQUEST['Search']['platform'];
                                break;
                }
            }

            if(isset($_REQUEST['Search']['level']) && $_REQUEST['Search']['level']){
                preg_match('/(\d+)([\- ]+)(\d+)/',$_REQUEST['Search']['level'], $matches);
                $level = array($matches[1],$matches[3]);
                sort($level);
                $where .= ' and level between '.$level[0].' and '.$level[1];
            }


        }
        return $where;
    }

}
