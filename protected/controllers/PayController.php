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
        $sql = "
            select `level`,agent_id,server_id, count(distinct role_id) as pay_num, sum(rmb) as pay_money
            from base_pay
            group by level
        ";

        $count = Yii::app()->db->createCommand('select count(distinct level) from base_pay')->queryScalar();
        $model = new CSqlDataProvider($sql,array(
            'keyField'=>'level',
            'totalItemCount'=>$count,
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));

		$this->render('lvStatus',array('model'=>$model));
	}

	public function actionRanking()
	{
        $model = new CActiveDataProvider('ViewPayRanking',array(
            /*'criteria'=>array(
                'condition'=>$where,
            ),
            'totalItemCount'=>$page['count'],*/
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));
		$this->render('ranking',array('model'=>$model));
	}

    public function actionConsume()
    {
        $model = new CActiveDataProvider('ViewConsumeRanking',array(
            /*'criteria'=>array(
                'condition'=>$where,
            ),
            'totalItemCount'=>$page['count'],*/
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));
        $this->render('consume',array('model'=>$model));
    }

    /*
     * 没有充值统计
     */
	public function actionStatistics()
	{
        $sql = "
            select DATE_FORMAT(`date`,'%Y-%m') as month, sum(reg_num) as reg_num, sum(reg_pay_money) as reg_pay_money,
                sum(login_num) as login_num, sum(pay_money) as pay_money, sum(pay_times) as pay_times, sum(pay_num) as pay_num
            from cron_days_count
            group by month
        ";
        $count = Yii::app()->db->createCommand("select count(distinct DATE_FORMAT(`date`,'%Y-%m') ) from cron_days_count")->queryScalar();
        $model = new CSqlDataProvider($sql,array(
            'keyField'=>'month',
            'totalItemCount'=>$count,
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));

        $this->render('statistics',array('dataProvider'=>$model) );
	}

	public function actionStatus()
	{
        $model = new CActiveDataProvider('CronDaysCount',array(
            /*'criteria'=>array(
                'condition'=>$where,
            ),
            'totalItemCount'=>$page['count'],*/
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));
		$this->render('status',array('model'=>$model));
	}
}