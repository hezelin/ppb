<?php

/**
 * This is the model class for table "cron_days_remain".
 *
 * The followings are the available columns in table 'cron_days_remain':
 * @property string $date
 * @property string $new_num
 * @property string $week
 * @property string $day1
 * @property string $day2
 * @property string $day3
 * @property string $day4
 * @property string $day5
 * @property string $day6
 * @property string $day7
 * @property string $day8
 * @property string $day9
 * @property string $day10
 * @property string $day11
 * @property string $day12
 * @property string $day13
 * @property string $day14
 * @property string $day15
 * @property string $day16
 * @property string $day17
 * @property string $day18
 * @property string $day19
 * @property string $day20
 * @property string $day21
 * @property string $day22
 * @property string $day23
 * @property string $day24
 * @property string $day25
 * @property string $day26
 * @property string $day27
 * @property string $day28
 * @property string $day29
 * @property string $day30
 * @property string $day40
 * @property string $day50
 * @property string $day60
 */
class CronDaysRemain extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cron_days_remain';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, week', 'required'),
			array('new_num', 'length', 'max'=>10),
			array('week, day1, day2, day3, day4, day5, day6, day7, day8, day9, day10, day11, day12, day13, day14, day15, day16, day17, day18, day19, day20, day21, day22, day23, day24, day25, day26, day27, day28, day29, day30, day40, day50, day60', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('date, new_num, week, day1, day2, day3, day4, day5, day6, day7, day8, day9, day10, day11, day12, day13, day14, day15, day16, day17, day18, day19, day20, day21, day22, day23, day24, day25, day26, day27, day28, day29, day30, day40, day50, day60', 'safe', 'on'=>'search'),
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
			'date' => '日期',
			'new_num' => '新增注册',
			'week' => '星期',
			'day1' => 'Day1',
			'day2' => 'Day2',
			'day3' => 'Day3',
			'day4' => 'Day4',
			'day5' => 'Day5',
			'day6' => 'Day6',
			'day7' => 'Day7',
			'day8' => 'Day8',
			'day9' => 'Day9',
			'day10' => 'Day10',
			'day11' => 'Day11',
			'day12' => 'Day12',
			'day13' => 'Day13',
			'day14' => 'Day14',
			'day15' => 'Day15',
			'day16' => 'Day16',
			'day17' => 'Day17',
			'day18' => 'Day18',
			'day19' => 'Day19',
			'day20' => 'Day20',
			'day21' => 'Day21',
			'day22' => 'Day22',
			'day23' => 'Day23',
			'day24' => 'Day24',
			'day25' => 'Day25',
			'day26' => 'Day26',
			'day27' => 'Day27',
			'day28' => 'Day28',
			'day29' => 'Day29',
			'day30' => 'Day30',
			'day40' => 'Day40',
			'day50' => 'Day50',
			'day60' => 'Day60',
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

		$criteria->compare('date',$this->date,true);
		$criteria->compare('new_num',$this->new_num,true);
		$criteria->compare('week',$this->week,true);
		$criteria->compare('day1',$this->day1,true);
		$criteria->compare('day2',$this->day2,true);
		$criteria->compare('day3',$this->day3,true);
		$criteria->compare('day4',$this->day4,true);
		$criteria->compare('day5',$this->day5,true);
		$criteria->compare('day6',$this->day6,true);
		$criteria->compare('day7',$this->day7,true);
		$criteria->compare('day8',$this->day8,true);
		$criteria->compare('day9',$this->day9,true);
		$criteria->compare('day10',$this->day10,true);
		$criteria->compare('day11',$this->day11,true);
		$criteria->compare('day12',$this->day12,true);
		$criteria->compare('day13',$this->day13,true);
		$criteria->compare('day14',$this->day14,true);
		$criteria->compare('day15',$this->day15,true);
		$criteria->compare('day16',$this->day16,true);
		$criteria->compare('day17',$this->day17,true);
		$criteria->compare('day18',$this->day18,true);
		$criteria->compare('day19',$this->day19,true);
		$criteria->compare('day20',$this->day20,true);
		$criteria->compare('day21',$this->day21,true);
		$criteria->compare('day22',$this->day22,true);
		$criteria->compare('day23',$this->day23,true);
		$criteria->compare('day24',$this->day24,true);
		$criteria->compare('day25',$this->day25,true);
		$criteria->compare('day26',$this->day26,true);
		$criteria->compare('day27',$this->day27,true);
		$criteria->compare('day28',$this->day28,true);
		$criteria->compare('day29',$this->day29,true);
		$criteria->compare('day30',$this->day30,true);
		$criteria->compare('day40',$this->day40,true);
		$criteria->compare('day50',$this->day50,true);
		$criteria->compare('day60',$this->day60,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CronDaysRemain the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
