<?php


class ViewPayRanking extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'view_pay_ranking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, register_time, last_login_time, gold, silver, level, first_pay_time, last_pay_time', 'numerical', 'integerOnly'=>true),
			array('pay_money', 'length', 'max'=>32),
			array('pay_times', 'length', 'max'=>21),
			array('account_name, role_name', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pay_money, pay_times, role_id, account_name, role_name, register_time, last_login_time, gold, silver, level, first_pay_time, last_pay_time', 'safe', 'on'=>'search'),
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
            'rank' => '排名',
			'pay_money' => '充值金额',
			'pay_times' => '充值次数',
			'role_id' => '角色id',
			'account_name' => '账号名称',
			'role_name' => '玩家名称',
			'register_time' => '注册时间',
			'last_login_time' => '最后登录时间',
			'gold' => '玩家金币',
			'silver' => '银币数',
			'level' => '玩家等级',
			'first_pay_time' => '首次充值时间',
			'last_pay_time' => '最后充值时间',
            'alarm' => '报警',
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

		$criteria->compare('pay_money',$this->pay_money,true);
		$criteria->compare('pay_times',$this->pay_times,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('role_name',$this->role_name,true);
		$criteria->compare('register_time',$this->register_time);
		$criteria->compare('last_login_time',$this->last_login_time);
		$criteria->compare('gold',$this->gold);
		$criteria->compare('silver',$this->silver);
		$criteria->compare('level',$this->level);
		$criteria->compare('first_pay_time',$this->first_pay_time);
		$criteria->compare('last_pay_time',$this->last_pay_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ViewPayRanking the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
