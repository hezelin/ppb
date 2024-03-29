<?php

/**
 * This is the model class for table "tbl_activation_total".
 *
 * The followings are the available columns in table 'tbl_activation_total':
 * @property string $id
 * @property string $total
 * @property string $tips
 * @property string $create_time
 */
class TblActivationTotal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_activation_total';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, total, create_time', 'required'),
			array('id', 'length', 'max'=>2),
			array('total, create_time', 'length', 'max'=>10),
            array('total','numerical'),
			array('tips', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, total, tips, create_time', 'safe', 'on'=>'search'),
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
			'id' => '活动id',
			'total' => '激活码数量',
			'tips' => '激活码说明',
			'create_time' => '创建时间',
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
		$criteria->compare('total',$this->total,true);
		$criteria->compare('tips',$this->tips,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'create_time DESC',
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblActivationTotal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
