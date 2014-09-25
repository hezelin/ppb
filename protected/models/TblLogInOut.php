<?php

/**
 * This is the model class for table "log_in_out".
 *
 * The followings are the available columns in table 'log_in_out':
 * @property integer $id
 * @property integer $role_id
 * @property integer $in_level
 * @property integer $in_time
 * @property integer $out_level
 * @property integer $out_time
 */
class TblLogInOut extends PlatformActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_in_out';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, in_level, in_time, out_level, out_time', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role_id, in_level, in_time, out_level, out_time', 'safe', 'on'=>'search'),
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
			'in_level' => '上线时等级',
			'in_time' => '上线时间',
			'out_level' => '下线时等级',
			'out_time' => '下线时间',
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
		$criteria->compare('in_level',$this->in_level);
		$criteria->compare('in_time',$this->in_time);
		$criteria->compare('out_level',$this->out_level);
		$criteria->compare('out_time',$this->out_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblLogInOut the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
