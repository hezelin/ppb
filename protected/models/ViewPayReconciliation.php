<?php


class ViewPayReconciliation extends PlatformActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'view_pay_reconciliation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent_id, server_id, role_id, level, rmb, ctime', 'numerical', 'integerOnly'=>true),
			array('account_name, role_name', 'length', 'max'=>500),
			array('order_number', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('agent_id, server_id, account_name, role_id, role_name, level, rmb, order_number, ctime', 'safe', 'on'=>'search'),
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
			'agent_id' => '代理id',
			'server_id' => '服id',
			'account_name' => '账号名称',
			'role_id' => '角色id',
			'role_name' => '玩家名称',
			'level' => '玩家等级',
			'rmb' => '充值金额',
			'order_number' => '订单号',
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

		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('server_id',$this->server_id);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('role_name',$this->role_name,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('rmb',$this->rmb);
		$criteria->compare('order_number',$this->order_number,true);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ViewPayReconciliation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
