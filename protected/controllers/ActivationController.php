<?php

class ActivationController extends Controller
{
//    激活码加密key
    private $_key = 'sP-2l=';

	public function actionCheck()
	{
        if(isset($_GET['code']))
        {
            $status = Yii::app()->db->createCommand()
                ->select('status')
                ->from('tbl_activation')
                ->where('code=:code',array(':code'=>$_GET['code']))
                ->queryScalar();
            echo $status;
        }
	}

    public function actionRecord()
    {
        if( isset($_GET['code']) && $_GET['code'] )
        {
            $model = TblActivation::model()->findByPk($_GET['code']) or die('no');
            if( $model->status == 'yes' ) echo 'no';
            else{
                $model->status = 'yes';
                if( $model->save() )
                    echo 'yes';
                else echo 'no';

            }
        }else echo 'no';
    }

	public function actionCreate()
	{
		$this->render('create');
	}

    public function actionList()
    {
        $model=new TblActivationTotal('search');

        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['TblActivationTotal']))
            $model->attributes=$_GET['TblActivationTotal'];
        $this->render('list',array('model'=>$model));
    }

    public function actionEditable()
    {
        if( $r = Yii::app()->getRequest() )
        {

            $model = TblActivationTotal::model()->findByPk($r->getParam('pk'));
            $name = $r->getParam('name');
            $model->$name = $r->getParam('value');
            if( !$model->save() )
                print_r( $model->errors );
        }
    }

    public function actionStatus()
    {
        if( $r = Yii::app()->getRequest() )
        {

            $model = TblActivation::model()->findByPk($r->getParam('pk'));
            $name = $r->getParam('name');
            $model->$name = $r->getParam('value');
            if( !$model->save() )
                print_r( $model->errors );
        }
    }

    public function actionView()
    {

        $model=new TblActivation('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['TblActivation']))
            $model->attributes=$_GET['TblActivation'];

        if( isset( $_GET['code_id'])){
            $model->dbCriteria->addCondition("id='".$_GET['code_id']."'");
        }

        $this->render('view',array('model'=>$model));
    }

    /*
     * 接口的说明
     */
    public function actionPort()
    {
        $this->render('port');
    }

	public function actionIndex()
	{
        if(isset($_POST['TblActivationTotal']))
        {
            // 查询此 id 是否存在
            $start = Yii::app()->db->createCommand()
                ->select('total')
                ->from('tbl_activation_total')
                ->where('id=:id',array(':id'=>$_POST['TblActivationTotal']['id']))
                ->queryScalar();
            if( $start ){                   // 如果存在，追加激活码
                $model = TblActivationTotal::model()->findByPk($_POST['TblActivationTotal']['id']);
                $model->total += $_POST['TblActivationTotal']['total'];
                $model->tips = $_POST['TblActivationTotal']['tips'];
            }else{                          // 新增加
                $start = 0;
                $model = new TblActivationTotal();
                $model->attributes=$_POST['TblActivationTotal'];
                $model->create_time = time();
            }

            if($model->save()){
//                生成验证码
                $this->createActivation( $model->id,$start,$_POST['TblActivationTotal']['total'] );
                echo json_encode( array('status'=>1,'msg'=>'创建激活码成功') );
            }else echo json_encode( array('status'=>0,'error'=>'出现未知错误。') );

            Yii::app()->end();
        }

        $model = new TblActivationTotal();
        $this->render('index',array('model'=>$model));
	}

    /*
     * 绑定参数生成激活码
     */
    private function createActivation($id,$start,$len)
    {
        $end =$len + $start;

        $sql="INSERT INTO tbl_activation (code, id) VALUES(:code,:id)";
        $command=Yii::app()->db->createCommand($sql);

        for($i=$start;$i<$end;$i++)
        {
            $sub = $id.sprintf('%04s', dechex($i));
            $code = $sub.substr(md5($sub.$this->_key),0,7);
            $command->bindParam(":code",$code,PDO::PARAM_STR);
            $command->bindParam(":id",$id,PDO::PARAM_STR);
            $command->execute();
        }
    }
}