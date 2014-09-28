<?php

class UserController extends Controller
{
    public $layout = '/layouts/clean';
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
                'foreColor'=>0xF58A18,
                'maxLength'=>6,   // 最多生成几个字符
                'minLength'=>5,   // 最少生成几个字符  #F58A18
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            /*'page'=>array(
                'class'=>'CViewAction',
            ),*/
        );
    }
	public function actionDelUser()
	{
		$this->render('delUser');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLogin()
	{
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect((isset($_GET['url']) && $_GET['url'] )? $_GET['url']:Yii::app()->user->returnUrl );
        }
        // display the login form
        $this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
        Yii::app()->user->logout();
        $this->redirect((isset($_GET['url']) && $_GET['url'] )? $_GET['url']:Yii::app()->user->loginUrl);
	}

	public function actionNewUser()
	{
		$this->render('newUser');
	}

	public function actionRegister()
	{

        $model = new Register();

        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Register']))
        {
            $model->password = md5($_POST['Register']['setpswd'].$model->salt);

            $model->attributes=$_POST['Register'];
            if($model->save()){
                //注册成功，赋值登录
                Yii::app()->user->id=$model->uid;
                Yii::app()->user->name=$model->name;
//                $this->redirect(array('sns/board','id'=>$model->uid));
                $this->redirect(array('user/index'));
            }
        }
        $this->render('register', array('model'=>$model));
	}

	public function actionSetPassword()
	{
		$this->render('setPassword');
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