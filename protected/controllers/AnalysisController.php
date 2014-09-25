<?php

class AnalysisController extends Controller
{
	public function actionConsume()
	{
		$this->render('consume');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLvRemain()
	{
		$this->render('lvRemain');
	}

	public function actionOnline()
	{
		$this->render('online');
	}

	public function actionRunAway()
	{
		$this->render('runAway');
	}

	public function actionShop()
	{
		$this->render('shop');
	}

	public function actionTimeRegister()
	{
		$this->render('timeRegister');
	}

	public function actionUserRemain()
	{
		$this->render('userRemain');
	}

	public function actionVip()
	{
		$this->render('vip');
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