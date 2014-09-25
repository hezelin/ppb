<?php

class PayController extends Controller
{
	public function actionAddOrder()
	{
		$this->render('addOrder');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLtv()
	{
		$this->render('ltv');
	}

	public function actionLvStatus()
	{
		$this->render('lvStatus');
	}

	public function actionRanking()
	{
		$this->render('ranking');
	}

	public function actionStatistics()
	{
		$this->render('statistics');
	}

	public function actionStatus()
	{
		$this->render('status');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}