<?php


class ViewConsumeRanking extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'view_consume_ranking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, register_time, last_login_time, gold, silver, level, first_consume_time, last_consume_time', 'numerical', 'integerOnly'=>true),
			array('consume_gold, consume_silver', 'length', 'max'=>32),
			array('consume_times', 'length', 'max'=>21),
			array('account_name, role_name', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('consume_gold, consume_silver, consume_times, role_id, account_name, role_name, register_time, last_login_time, gold, silver, level, first_consume_time, last_consume_time', 'safe', 'on'=>'search'),
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
			'consume_gold' => '消费元宝',
			'consume_silver' => '消费银两',
			'consume_times' => '消费次数',
			'role_id' => '角色id',
			'account_name' => '账号名称',
			'role_name' => '玩家名称',
			'register_time' => '注册时间',
			'last_login_time' => '上次登录时间',
			'gold' => '玩家金币',
			'silver' => '银币数',
			'level' => '玩家等级',
			'first_consume_time' => '首次消费时间',
			'last_consume_time' => '最后消费时间',
            'alarm' => '报警',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('consume_gold',$this->consume_gold,true);
		$criteria->compare('consume_silver',$this->consume_silver,true);
		$criteria->compare('consume_times',$this->consume_times,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('role_name',$this->role_name,true);
		$criteria->compare('register_time',$this->register_time);
		$criteria->compare('last_login_time',$this->last_login_time);
		$criteria->compare('gold',$this->gold);
		$criteria->compare('silver',$this->silver);
		$criteria->compare('level',$this->level);
		$criteria->compare('first_consume_time',$this->first_consume_time);
		$criteria->compare('last_consume_time',$this->last_consume_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
