<?php

class PlatformController extends Controller
{
	public function actionIndex()
	{
        $model = new TblPlatform();
        if(isset($_POST['TblPlatform']))
        {
            $model->attributes=$_POST['TblPlatform'];
            $model->create_time = time();
            if($model->save()){
                echo json_encode( array('status'=>1,'msg'=>'添加平台成功') );
            }else echo json_encode( array('status'=>0,'error'=>'出现未知错误。') );

            Yii::app()->end();
        }

        $this->render('index',array('model'=>$model));
	}

	public function actionList()
	{
        $model=new TblPlatform('search');

        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['TblPlatform']))
            $model->attributes=$_GET['TblPlatform'];
        $this->render('list',array('model'=>$model));
	}

    public function actionEditable()
    {
        if( $r = Yii::app()->getRequest() )
        {
            $model = TblPlatform::model()->findByPk($r->getParam('pk'));
            $name = $r->getParam('name');
            $model->$name = $r->getParam('value');
            if( !$model->save() )
                print_r( $model->errors );
        }
    }
}