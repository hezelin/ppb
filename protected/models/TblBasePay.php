<?php

/**
 * This is the model class for table "base_pay".
 *
 * The followings are the available columns in table 'base_pay':
 * @property string $order_number
 * @property integer $agent_id
 * @property integer $server_id
 * @property integer $role_id
 * @property integer $level
 * @property integer $rmb
 * @property integer $gold
 * @property integer $get
 * @property integer $ctime
 */
class TblBasePay extends PlatformActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'base_pay';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent_id, server_id, role_id, level, rmb, gold, get, ctime', 'numerical', 'integerOnly'=>true),
			array('order_number', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_number, agent_id, server_id, role_id, level, rmb, gold, get, ctime', 'safe', 'on'=>'search'),
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
			'order_number' => '订单号',
			'agent_id' => '代理id',
			'server_id' => '服id',
			'role_id' => '角色id',
			'level' => '等级',
			'rmb' => '充值金额',
			'gold' => '对等获得钻石',
			'get' => '是否已获得',
			'ctime' => '时间',
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

		$criteria->compare('order_number',$this->order_number,true);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('server_id',$this->server_id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('rmb',$this->rmb);
		$criteria->compare('gold',$this->gold);
		$criteria->compare('get',$this->get);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblBasePay the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
