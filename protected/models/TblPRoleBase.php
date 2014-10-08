<?php


class TblPRoleBase extends PlatformActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'p_role_base';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, agent_id, server_id, icon, reg_date, last_login_time, acc_gold_use, last_up_date, silver, gold, vip_level, cur_tili, max_tili, add_money_time, add_money_last_time, buy_tili_time, buy_tili_last_time, level, exp, friendship, month_vip', 'numerical', 'integerOnly'=>true),
			array('account_name, role_name, reg_mac, last_login_mac', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('role_id, account_name, role_name, agent_id, server_id, icon, reg_mac, reg_date, last_login_time, last_login_mac, acc_gold_use, last_up_date, silver, gold, vip_level, cur_tili, max_tili, add_money_time, add_money_last_time, buy_tili_time, buy_tili_last_time, level, exp, friendship, month_vip', 'safe', 'on'=>'search'),
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
			'role_id' => '角色id',
			'account_name' => '账号名称',
			'role_name' => '玩家名字',
			'agent_id' => '平台id',
			'server_id' => '服务器id',
			'icon' => '玩家头像图标id',
			'reg_mac' => '注册机型',
			'reg_date' => '注册时间',
			'last_login_time' => '上次登录时间',
			'last_login_mac' => '上次登录机型',
			'acc_gold_use' => '累计金币消耗',
			'last_up_date' => '上次更新时间',
			'silver' => '银币数		',
			'gold' => '玩家金币',
			'vip_level' => 'VIP等级',
			'cur_tili' => '当前体力',
			'max_tili' => '体力最大值',
			'add_money_time' => '加钱次数',
			'add_money_last_time' => '上次加钱时间戳',
			'buy_tili_time' => '购买体力次数',
			'buy_tili_last_time' => '上次购买体力时间戳',
			'level' => '玩家等级',
			'exp' => '玩家经验',
			'friendship' => '友情值',
			'month_vip' => '月卡vip等级',
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

		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('role_name',$this->role_name,true);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('server_id',$this->server_id);
		$criteria->compare('icon',$this->icon);
		$criteria->compare('reg_mac',$this->reg_mac,true);
		$criteria->compare('reg_date',$this->reg_date);
		$criteria->compare('last_login_time',$this->last_login_time);
		$criteria->compare('last_login_mac',$this->last_login_mac,true);
		$criteria->compare('acc_gold_use',$this->acc_gold_use);
		$criteria->compare('last_up_date',$this->last_up_date);
		$criteria->compare('silver',$this->silver);
		$criteria->compare('gold',$this->gold);
		$criteria->compare('vip_level',$this->vip_level);
		$criteria->compare('cur_tili',$this->cur_tili);
		$criteria->compare('max_tili',$this->max_tili);
		$criteria->compare('add_money_time',$this->add_money_time);
		$criteria->compare('add_money_last_time',$this->add_money_last_time);
		$criteria->compare('buy_tili_time',$this->buy_tili_time);
		$criteria->compare('buy_tili_last_time',$this->buy_tili_last_time);
		$criteria->compare('level',$this->level);
		$criteria->compare('exp',$this->exp);
		$criteria->compare('friendship',$this->friendship);
		$criteria->compare('month_vip',$this->month_vip);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblPRoleBase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
