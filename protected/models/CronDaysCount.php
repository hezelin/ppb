<?php

/**
 * This is the model class for table "cron_days_count".
 *
 * The followings are the available columns in table 'cron_days_count':
 * @property string $id
 * @property string $date
 * @property string $agent_id
 * @property string $server_id
 * @property double $pay_money
 * @property string $pay_times
 * @property string $pay_num
 * @property double $reg_pay_money
 * @property string $reg_pay_num
 * @property string $reg_num
 * @property string $login_num
 * @property string $login_times
 * @property string $first_pay_money
 * @property string $first_pay_num
 */
class CronDaysCount extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cron_days_count';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, agent_id, server_id', 'required'),
			array('pay_money, reg_pay_money', 'numerical'),
			array('agent_id, server_id, pay_times, pay_num, reg_pay_num, reg_num, login_num, login_times, first_pay_money, first_pay_num', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, agent_id, server_id, pay_money, pay_times, pay_num, reg_pay_money, reg_pay_num, reg_num, login_num, login_times, first_pay_money, first_pay_num', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => '日期',
			'agent_id' => '平台id',
			'server_id' => '服务id',
			'pay_money' => '充值金额',
			'pay_times' => '充值次数',
			'pay_num' => '充值人数',
			'reg_pay_money' => '当天注册充值金额',
			'reg_pay_num' => '当天注册充值人数',
			'reg_num' => '注册人数',
			'login_num' => '登录人数',
			'login_times' => '登录次数',
			'first_pay_money' => '首次充值金额',
			'first_pay_num' => '首次充值人数',
            'pay_ratio' => '付费率',
            'reg_pay_ratio' => '注册付费率',
            'arpu' => '注册 arpu',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('agent_id',$this->agent_id,true);
		$criteria->compare('server_id',$this->server_id,true);
		$criteria->compare('pay_money',$this->pay_money);
		$criteria->compare('pay_times',$this->pay_times,true);
		$criteria->compare('pay_num',$this->pay_num,true);
		$criteria->compare('reg_pay_money',$this->reg_pay_money);
		$criteria->compare('reg_pay_num',$this->reg_pay_num,true);
		$criteria->compare('reg_num',$this->reg_num,true);
		$criteria->compare('login_num',$this->login_num,true);
		$criteria->compare('login_times',$this->login_times,true);
		$criteria->compare('first_pay_money',$this->first_pay_money,true);
		$criteria->compare('first_pay_num',$this->first_pay_num,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CronDaysCount the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
