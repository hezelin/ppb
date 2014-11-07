<?php

/**
 * This is the model class for table "tbl_server".
 *
 * The followings are the available columns in table 'tbl_server':
 * @property string $id
 * @property string $agent_id
 * @property string $agent_name
 * @property string $server_id
 * @property string $server_name
 * @property string $ip
 * @property string $port
 * @property string $is_open
 * @property string $is_show
 * @property string $is_recommend
 * @property integer $status
 * @property integer $order
 * @property string $create_time
 */
class TblServer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_server';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent_id, agent_name, server_id, server_name, ip, port, order, create_time', 'required'),
			array('status, order', 'numerical', 'integerOnly'=>true),
			array('agent_id, server_id, port, create_time', 'length', 'max'=>10),
			array('agent_name, server_name', 'length', 'max'=>100),
			array('ip', 'length', 'max'=>15),
			array('is_open, is_show, is_recommend', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, agent_id, agent_name, server_id, server_name, ip, port, is_open, is_show, is_recommend, status, order, create_time', 'safe', 'on'=>'search'),
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
			'agent_id' => '平台id',
			'agent_name' => '平台名',
			'server_id' => '服务器ID',
			'server_name' => '服务器名',
			'ip' => 'IP',
			'port' => '端口',
			'is_open' => '是否开启',
			'is_show' => '是否显示',
			'is_recommend' => '是否推荐',
			'status' => '服务器状态',
			'order' => '排序',
			'create_time' => '添加时间',
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
		$criteria->compare('agent_id',$this->agent_id,true);
		$criteria->compare('agent_name',$this->agent_name,true);
		$criteria->compare('server_id',$this->server_id,true);
		$criteria->compare('server_name',$this->server_name,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('port',$this->port,true);
		$criteria->compare('is_open',$this->is_open,true);
		$criteria->compare('is_show',$this->is_show,true);
		$criteria->compare('is_recommend',$this->is_recommend,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('order',$this->order);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblServer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
