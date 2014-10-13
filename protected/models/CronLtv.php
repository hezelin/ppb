<?php

/**
 * This is the model class for table "cron_ltv".
 *
 * The followings are the available columns in table 'cron_ltv':
 * @property string $date
 * @property integer $agent_id
 * @property integer $server_id
 * @property string $new_register
 * @property double $LTV1
 * @property double $LTV2
 * @property double $LTV3
 * @property double $LTV4
 * @property double $LTV5
 * @property double $LTV6
 * @property double $LTV7
 * @property double $LTV15
 * @property double $LTV30
 * @property double $LTV60
 * @property double $LTV90
 * @property integer $LTV120
 * @property integer $LTV150
 * @property integer $LTV180
 */
class CronLtv extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cron_ltv';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, agent_id, server_id, new_register, LTV1, LTV2, LTV3, LTV4, LTV5, LTV6, LTV7, LTV15, LTV30, LTV60, LTV90, LTV120, LTV150, LTV180', 'required'),
			array('agent_id, server_id, LTV120, LTV150, LTV180', 'numerical', 'integerOnly'=>true),
			array('LTV1, LTV2, LTV3, LTV4, LTV5, LTV6, LTV7, LTV15, LTV30, LTV60, LTV90', 'numerical'),
			array('new_register', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('date, agent_id, server_id, new_register, LTV1, LTV2, LTV3, LTV4, LTV5, LTV6, LTV7, LTV15, LTV30, LTV60, LTV90, LTV120, LTV150, LTV180', 'safe', 'on'=>'search'),
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
			'date' => '日期',
			'agent_id' => '平台id',
			'server_id' => '服务id',
			'new_register' => '新增注册',
			'LTV1' => 'Ltv1',
			'LTV2' => 'Ltv2',
			'LTV3' => 'Ltv3',
			'LTV4' => 'Ltv4',
			'LTV5' => 'Ltv5',
			'LTV6' => 'Ltv6',
			'LTV7' => 'Ltv7',
			'LTV15' => 'Ltv15',
			'LTV30' => 'Ltv30',
			'LTV60' => 'Ltv60',
			'LTV90' => 'Ltv90',
			'LTV120' => 'Ltv120',
			'LTV150' => 'Ltv150',
			'LTV180' => 'Ltv180',
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

		$criteria->compare('date',$this->date,true);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('server_id',$this->server_id);
		$criteria->compare('new_register',$this->new_register,true);
		$criteria->compare('LTV1',$this->LTV1);
		$criteria->compare('LTV2',$this->LTV2);
		$criteria->compare('LTV3',$this->LTV3);
		$criteria->compare('LTV4',$this->LTV4);
		$criteria->compare('LTV5',$this->LTV5);
		$criteria->compare('LTV6',$this->LTV6);
		$criteria->compare('LTV7',$this->LTV7);
		$criteria->compare('LTV15',$this->LTV15);
		$criteria->compare('LTV30',$this->LTV30);
		$criteria->compare('LTV60',$this->LTV60);
		$criteria->compare('LTV90',$this->LTV90);
		$criteria->compare('LTV120',$this->LTV120);
		$criteria->compare('LTV150',$this->LTV150);
		$criteria->compare('LTV180',$this->LTV180);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CronLtv the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
