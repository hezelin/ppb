<?php

class PlayerController extends Controller
{
	public function actionGood()
	{
		$this->render('good');
	}

	public function actionInfo()
	{
        $model=new TblPRoleBase('search');
        $model->unsetAttributes();
        if(isset($_GET['TblPRoleBase'])){
            $model->attributes=$_GET['TblPRoleBase'];
        }
		$this->render('info',array('model'=>$model));
	}
    /*
     * 玩家详情
     */
    public function actionView($id)
    {
        $model = TblPRoleBase::model()->findByPk($id);
        $this->render('view',array('model'=>$model));
    }

	public function actionMail()
	{
		$this->render('mail');
	}

	public function actionRelation()
	{
		$this->render('relation');
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