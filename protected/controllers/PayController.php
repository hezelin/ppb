<?php

class PayController extends Controller
{
	public function actionAddOrder()
	{
		$this->render('addOrder');
	}

	public function actionIndex()
	{
        $search = new Search();

        $where = '1=1';
        if( isset($_REQUEST['Search'])){
            $search->attributes=$_REQUEST['Search'];
            $where = $search->getWhere();
            $search->dateRang = $_REQUEST['Search']['dateRang'];
            $search->platform = $_REQUEST['Search']['platform'];
        }
        $total = Yii::app()->db2->createCommand()
            ->select('sum(`rmb`)')
            ->from('base_pay')
            ->queryScalar();

        $page = Yii::app()->db2->createCommand()
            ->select('sum(`rmb`) as `total` ,count(*) as `count`')
            ->from('view_pay_reconciliation')
            ->where($where)
            ->queryRow();

        $model = new CActiveDataProvider('ViewPayReconciliation',array(
            'criteria'=>array(
                'condition'=>$where,
            ),
            'totalItemCount'=>$page['count'],
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));

        $urls = parse_url( Yii::app()->request->url );
        $outputUrl = '/pay/output?'. ( isset($urls['query'])? $urls['query']:'' );
        $this->render('index',array('model'=>$model,'total'=>$total,'pageTotal'=>$page['total'],'search'=>$search,'outputUrl'=>$outputUrl));
	}

    public function actionOutput()
    {
        $excel = new Excel();
        $excel->addHeader(array('列1','列2','列3','列4'));
        $excel->addBody(
            array(
                array('数据1','数据2','数据3','数据4'),
                array('数据1','数据2','数据3','数据4'),
                array('数据1','数据2','数据3','数据4'),
                array('数据1','数据2','数据3','数据4')
            )
        );
        $excel->downLoad('对账管理.xls');
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