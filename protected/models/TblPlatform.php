<?php

/**
 * This is the model class for table "tbl_platform".
 *
 * The followings are the available columns in table 'tbl_platform':
 * @property string $id
 * @property string $plat_name
 * @property string $plat_url
 * @property string $plat_server
 * @property string $mysql_dbname
 * @property string $mysql_account
 * @property string $mysql_password
 * @property string $mysql_ip
 * @property string $create_time
 */
class TblPlatform extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_platform';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plat_name, plat_url, plat_server, mysql_dbname, mysql_account, mysql_password, mysql_ip, create_time', 'required'),
			array('plat_name, plat_url, plat_server', 'length', 'max'=>100),
			array('mysql_dbname, mysql_account, mysql_password, mysql_ip', 'length', 'max'=>50),
			array('create_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, plat_name, plat_url, plat_server, mysql_dbname, mysql_account, mysql_password, mysql_ip, create_time', 'safe', 'on'=>'search'),
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
			'plat_name' => '平台名称',
			'plat_url' => '平台地址',
			'plat_server' => '平台服务器',
			'mysql_dbname' => '数据库名称',
			'mysql_account' => '数据库账号',
			'mysql_password' => '数据库密码',
			'mysql_ip' => '数据库ip地址',
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
		$criteria->compare('plat_name',$this->plat_name,true);
		$criteria->compare('plat_url',$this->plat_url,true);
		$criteria->compare('plat_server',$this->plat_server,true);
		$criteria->compare('mysql_dbname',$this->mysql_dbname,true);
		$criteria->compare('mysql_account',$this->mysql_account,true);
		$criteria->compare('mysql_password',$this->mysql_password,true);
		$criteria->compare('mysql_ip',$this->mysql_ip,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblPlatform the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
