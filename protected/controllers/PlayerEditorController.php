<?php

class PlayerEditorController extends Controller
{
	public function actionCompensate()
	{
		$this->render('compensate');
	}

	public function actionDelGood()
	{
		$this->render('delGood');
	}

	public function actionDelMail()
	{
		$this->render('delMail');
	}

	public function actionForbid()
	{
		$this->render('forbid');
	}

	public function actionInfoAlter()
	{
		$this->render('infoAlter');
	}

	public function actionIssueGood()
	{
		$this->render('issueGood');
	}

	public function actionPetRelieve()
	{
		$this->render('petRelieve');
	}

	public function actionSetGM()
	{
		$this->render('setGM');
	}

	public function actionTask()
	{
		$this->render('task');
	}

	public function actionTransfer()
	{
		$this->render('transfer');
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