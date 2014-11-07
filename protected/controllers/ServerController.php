<?php

class ServerController extends Controller
{
	public function actionCreate()
	{
        if(isset($_POST['TblServer']))
        {
//            ToolDebug::dArray($_POST['TblServer'],true);
            $model = new TblServer();
            $model->attributes=$_POST['TblServer'];
            $model->create_time = time();

            if($model->save()){
                echo json_encode( array('status'=>1,'msg'=>'添加服务器成功') );
            }else echo json_encode( array('status'=>0,'error'=>'出现未知错误。') );

            Yii::app()->end();
        }

        $model = new TblServer();
		$this->render('create',array('model'=>$model));
	}

	public function actionDelete($id)
	{
        $model = TblServer::model()->findByPk($id);
        if( !$model->delete() )
            print_r($model->errors);
	}

	public function actionList()
	{
        $model=new TblServer('search');

        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['TblServer']))
            $model->attributes=$_GET['TblServer'];
        $this->render('list',array('model'=>$model));
	}

	public function actionUpdate($id)
	{
        $model = TblServer::model()->findByPk($id);
        if(isset($_POST['TblServer']))
        {
//            ToolDebug::dArray($_POST['TblServer'],true);
//            $model = new TblServer();
            $model->attributes=$_POST['TblServer'];
            $model->create_time = time();

            if($model->save()){
                echo json_encode( array('status'=>1,'msg'=>'添加服务器成功') );
            }else echo json_encode( array('status'=>0,'error'=>'出现未知错误。') );

            Yii::app()->end();
        }

        $this->render('update',array('model'=>$model));
	}

    public function actionPort()
    {
        $this->render('port');
    }

    public function actionEditable()
    {
        if( $r = Yii::app()->getRequest() )
        {
            // 更改推荐状态
            if( $r->getParam('name') == 'is_recommend' && $r->getParam('value') == 1){
                Yii::app()->db->createCommand()
                    ->update('tbl_server',
                        array('is_recommend'=>0),
                        'is_recommend=:value',
                        array(':value'=>1)
                    );
            }

            $model = TblServer::model()->findByPk($r->getParam('pk'));
            $name = $r->getParam('name');
            $model->$name = $r->getParam('value');
            if( !$model->save() )
                print_r( $model->errors );
        }
    }

    public function actionIndex()
    {
        $data = Yii::app()->db->createCommand()
            ->select('id,agent_id,agent_name,server_id,server_name,ip,port,is_open,status,order,create_time')
            ->from('tbl_server')
            ->where('is_show="1"')
            ->order('is_recommend desc,order desc')
            ->queryAll();

//        ToolDebug::dArray($data,true);
        header('content-type:text/html;charset=utf-8');
        echo json_encode($data,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        Yii::app()->end();
    }
}