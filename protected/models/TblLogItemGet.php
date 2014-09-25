<?php

/**
 * This is the model class for table "log_item_get".
 *
 * The followings are the available columns in table 'log_item_get':
 * @property integer $id
 * @property integer $role_id
 * @property integer $level
 * @property integer $bag_id
 * @property integer $item_id
 * @property integer $item_tpl_id
 * @property integer $num
 * @property integer $type
 * @property integer $ctime
 */
class TblLogItemGet extends PlatformActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_item_get';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, level, bag_id, item_id, item_tpl_id, num, type, ctime', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role_id, level, bag_id, item_id, item_tpl_id, num, type, ctime', 'safe', 'on'=>'search'),
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
			'bag_id' => '背包id',
			'item_id' => '物品id',
			'item_tpl_id' => '物品模板id',
			'num' => '数量',
			'type' => '获得类型',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('level',$this->level);
		$criteria->compare('bag_id',$this->bag_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('item_tpl_id',$this->item_tpl_id);
		$criteria->compare('num',$this->num);
		$criteria->compare('type',$this->type);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblLogItemGet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
