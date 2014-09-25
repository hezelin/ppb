<?php

/**
 * This is the model class for table "log_currency".
 *
 * The followings are the available columns in table 'log_currency':
 * @property integer $id
 * @property integer $role_id
 * @property integer $level
 * @property integer $gold
 * @property integer $now_gold
 * @property integer $silver
 * @property integer $now_silver
 * @property string $type
 * @property integer $ctime
 */
class TblLogCurrency extends PlatformActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, level, gold, now_gold, silver, now_silver, ctime', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role_id, level, gold, now_gold, silver, now_silver, type, ctime', 'safe', 'on'=>'search'),
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
			'id' => '自增id',
			'role_id' => '角色id',
			'level' => '角色等级',
			'gold' => '钻石变化',
			'now_gold' => '变化后钻石',
			'silver' => '银币变化',
			'now_silver' => '变化后银币',
			'type' => '流通类型',
			'ctime' => '流通时间',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('gold',$this->gold);
		$criteria->compare('now_gold',$this->now_gold);
		$criteria->compare('silver',$this->silver);
		$criteria->compare('now_silver',$this->now_silver);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblLogCurrency the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
