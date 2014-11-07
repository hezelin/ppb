<?php

class AnalysisController extends Controller
{
	public function actionConsume()
	{
        $day1 = '2014-09-01';
        $day2 = '2014-10-01';


		$this->render('consume');
	}

	public function actionIndex()
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
		$this->render('index',array('model'=>$model));
	}

    /*
     * 等级留存
     */
	public function actionLvRemain()
	{
        $day1 = strtotime('2014-10-27');
        $day2 = $day1 + 86399*2-1;
        $model = Yii::app()->db->createCommand()
            ->select('id,level,count(distinct role_id) as level_num')
            ->from('log_level_up')
            ->where('ctime between :day1 and :day2',array(':day1'=>$day1,':day2'=>$day2))
            ->andWhere('server_id=1')
            ->group('level,agent_id')
            ->queryAll();
        $total = array_sum( array_column($model,'level_num'));

        $regData = $remData1 = $cate = array();             // chart 表

        foreach($model as &$r)
        {
            $r['ratio'] = number_format( $r['level_num']/$total,2);
            //chart 表
            $regData[] = (int)$r['level_num'];
            $remData1[] = $r['ratio']*100;
            $cate[] = $r['level'];
        }

        // chart 表
        $data[0]['name'] = '等级人数';
        $data[1]['name'] = '占比';
        $data[0]['data'] = $regData;
        $data[1]['data'] = $remData1;

        $dataProvider = new CArrayDataProvider($model);
		$this->render('lvRemain',array('dataProvider'=>$dataProvider,'cate'=>$cate,'data'=>$data));
	}

    public function actionOnline()
    {
        if( isset($_GET['type']) && isset($_GET['type']) == 'history')
        {
            $day1 = strtotime('2014-10-20');
            $day2 = strtotime('2014-11-20');

            $model = Yii::app()->db->createCommand()
                ->select('id,from_unixtime(`ctime`,\'%Y-%m-%d\') as `date`,max(num) as height_num,min(num) as lower_num,avg(num) as aver_num')
                ->from('log_online_five')
                ->where('`ctime` between :day1 and :day2',array(':day1'=>$day1,':day2'=>$day2))
                ->andWhere('server_id=1')
                ->group('date')
                ->queryAll();

//        $total = array_sum( array_column($model,'level_num'));

            $data1 = $data2 = $data3 = $cate = array();             // chart 表
            foreach($model as &$r)
            {
                $r['aver_num'] = (int)$r['aver_num'];
                //chart 表
                $data1[] = (int)$r['height_num'];
                $data2[] = (int)$r['lower_num'];
                $data3[] = $r['aver_num'];

                $cate[] = $r['date'];
            }

            // chart 表
            $data[0]['name'] = '最高在线';
            $data[1]['name'] = '最低在线';
            $data[2]['name'] = '平均在线';
            $data[0]['data'] = $data1;
            $data[1]['data'] = $data2;
            $data[2]['data'] = $data3;

            $dataProvider = new CArrayDataProvider($model);

            $this->render('history',array('day1'=>$day1,'day2'=>$day2,'data'=>$data,'dataProvider'=>$dataProvider,'cate'=>$cate));
        }
        else
        {
            $day1 = '2014-10-20';
            $day2 = '2014-11-19';
            $dayStr1 = strtotime($day1);
            $dayStr2 = strtotime($day2);
            $data1 = $data2 = $cate = array();             // chart 表
            $model1 = Yii::app()->db->createCommand()
                ->select('ctime,sum(num) as online_num')
                ->from('log_online_five')
                ->where('`ctime` between :day1 and :day2',array(':day1'=>$dayStr1,':day2'=>$dayStr1+86399) )
                ->group('ctime')
                ->order('ctime asc')
                ->queryAll();

            $model2 = Yii::app()->db->createCommand()
                ->select('ctime, sum(num) as online_num')
                ->from('log_online_five')
                ->where('`ctime` between :day1 and :day2',array(':day1'=>$dayStr2,':day2'=>$dayStr2+86399) )
                ->group('ctime')
                ->order('ctime asc')
                ->queryAll();
//            if($data1)
            foreach($model1 as &$r)
            {
                $data1[] = (int)$r['online_num'];
                $cate[] = date('H:i',$r['ctime']);
            }
            foreach($model2 as &$r)
            {
                $data2[] = (int)$r['online_num'];
//                $cate[] = date('H:i',$r['time']);
            }

            // chart 表
            $data[0]['name'] = $day1;
            $data[1]['name'] = $day2;
            $data[0]['data'] = $data1;
            $data[1]['data'] = $data2;

//            $dataProvider = new CArrayDataProvider($model);
            $this->render('online',array('day1'=>$day1,'day2'=>$day2,'data'=>$data,'cate'=>$cate,'dayData'=>$this->getDay($dayStr1,$dayStr2)));
        }
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
        $total = Yii::app()->db2->createCommand()
            ->select('sum(role_num) as role,sum(account_num) as account')
            ->from('cron_hour_register')
            ->queryRow();

//        默认测试日期
        $day = '2014-10-15';

        $data = $this->dayHighChart($day);

        $model = new CActiveDataProvider('CronHourRegister',array(
            /*'criteria'=>array(
                'condition'=>$where,
            ),
            'totalItemCount'=>$page['count'],*/
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));
		$this->render('timeRegister',array('model'=>$model,'total'=>$total,'data'=>$data));
	}

	public function actionUserRemain()
	{
        $day1 = '2014-09-01';
        $day2 = '2014-11-01';

        $chartData = $this->chartRemain($day1,$day2);
        $model = new CActiveDataProvider('CronDaysRemain',array(
            /*'criteria'=>array(
                'condition'=>$where,
            ),
            'totalItemCount'=>$page['count'],*/
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));
        $this->render('userRemain',array('model'=>$model,'data'=>$chartData['data'],'cate'=>$chartData['cate']));
	}

	public function actionVip()
	{
        $model = new CActiveDataProvider('TblPRoleBase',array(
            /*'criteria'=>array(
                'condition'=>$where,
            ),
            'totalItemCount'=>$page['count'],*/
            'pagination'=>array(
                'pageSize'=>15,
            ),
        ));
		$this->render('vip',array('model'=>$model));
	}

    public function actionVipLevel()
    {
        $today = '2014-10-27';
        $day1 = strtotime($today);
        $day2 = $day1 + 86399;
        $model = Yii::app()->db->createCommand()
            ->select('id,vip,agent_id,count(distinct role_id) as vip_num,GROUP_CONCAT(distinct role_id) as role_list')
            ->from('log_vip')
            ->where('ctime between :day1 and :day2',array(':day1'=>$day1,':day2'=>$day2))
            ->andWhere('server_id=1')
            ->group('vip,agent_id')
            ->queryAll();

        foreach($model as &$r)
        {
            $roleIds = explode(',',$r['role_list']);
            $r['3days'] = $this->getVipRemain($roleIds,$day1,3);
            $r['7days'] = $this->getVipRemain($roleIds,$day1,7);
            $r['15days'] = $this->getVipRemain($roleIds,$day1,15);
            $r['30days'] = $this->getVipRemain($roleIds,$day1,30);
            unset($r['role_list']);
        }
        $dataProvider = new CArrayDataProvider($model);
        $this->render('vipLevel',array('dataProvider'=>$dataProvider));
    }

    private function dayHighChart($day)
    {
        $data[0]['name'] = '注册角色数';
        $data[1]['name'] = '注册账号数';

        $regData = Yii::app()->db->createCommand()
            ->select('hour,sum(role_num) as role,sum(account_num) as account')
            ->from('cron_hour_register')
            ->where('date=:date',array(':date'=>$day))
            ->group('date,hour')
            ->queryAll();
        $cate = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0,13=>0,14=>0,15=>0,16=>0,17=>0,18=>0,19=>0,20=>0,21=>0,22=>0,23=>0);
        $roleData = $accountData = array();

        foreach($regData as $r){
            $roleData[ $r['hour'] ] = (int)$r['role'];
            $accountData[ $r['hour'] ] = (int)$r['account'];
        }
        $data[0]['data'] = $roleData + $cate;
        $data[1]['data'] = $accountData + $cate;
        // 键值排序
        ksort($data[0]['data']);
        ksort($data[1]['data']);

        return $data;
    }

    private function chartRemain($day1,$day2)
    {
        $data[0]['name'] = '新增注册';
        $data[1]['name'] = '1天留存';
        /*$data[2]['name'] = '2天留存';
        $data[3]['name'] = '3天留存';*/

        $remainData = Yii::app()->db->createCommand()
            ->select('new_num,day1,date,day2,day3')
            ->from('cron_days_remain')
            ->where('date between :day1 and :day2',array(':day1'=>$day1,':day2'=>$day2))
            ->group('date')
            ->queryAll();

        $regData = $remData1= $remData2= $remData3 = $cate = array();

        foreach($remainData as $r){
            $regData[] = (int)$r['new_num'];
            $remData1[] = (int)($r['new_num']*$r['day1']);
            /*$remData2[] = (int)($r['new_num']*$r['day2']);
            $remData3[] = (int)($r['new_num']*$r['day3']);*/
            $cate[] = str_replace('-','',substr($r['date'],5));
        }
        $data[0]['data'] = $regData;
        $data[1]['data'] = $remData1;
        /*$data[2]['data'] = $remData2;
        $data[3]['data'] = $remData3;*/
        // 键值排序
        /*ksort($data[0]['data']);
        ksort($data[1]['data']);*/
        return array('cate'=>$cate,'data'=>$data);
    }

    /*
     * 获取vip 留存
     * @params $startDay 留存开始时间
     * @params $n = 3天，7天，15天，30天
     */
    private function getVipRemain($roleIds,$startDay,$n)
    {
        $start = $startDay;
        $end = $startDay+86400*$n-1;
        $count = Yii::app()->db->createCommand()
            ->select('count(distinct `role_id`)')
            ->from('log_in_out')
            ->where('in_time < :end and ( out_time > :start or out_time = 0 ) ',array(':start'=>$start,':end'=>$end))
            ->andWhere(array('in','role_id',$roleIds))
            ->queryScalar();
        return $count;

    }

    //    获取最高
    private function getDay($day1,$day2)
    {
        $day1 = (int)$day1;
        $day11 = $day1 + 86399;
        $day2 = (int)$day2;
        $day22 = $day2 + 86399;

        $sql1 = "select `ctime`, `num` from `log_online_five`
                    where `num` = (select max(`num`) from `log_online_five` where `ctime` between $day1 and $day11 )
                    and `ctime` between $day1 and $day11";

        $sql2 = "select `ctime`, `num` from `log_online_five`
                    where `num` = (select min(`num`) from `log_online_five` where `ctime` between $day1 and $day11)
                    and `ctime` between $day1 and $day11";

        $sql3 = "select `ctime`, `num` from `log_online_five`
                    where `num` = (select max(`num`) from `log_online_five` where `ctime` between $day2 and $day22 )
                    and `ctime` between $day2 and $day22";

        $sql4 = "select `ctime`, `num` from `log_online_five`
                    where `num` = (select min(`num`) from `log_online_five` where `ctime` between $day2 and $day22 )
                    and `ctime` between $day2 and $day22";

        $a = Yii::app()->db->createCommand($sql1)->queryRow();
        $b = Yii::app()->db->createCommand($sql2)->queryRow();
        $c = Yii::app()->db->createCommand($sql3)->queryRow();
        $d = Yii::app()->db->createCommand($sql4)->queryRow();

        $data[ date('Y-m-d',$day1) ]['highest_num'] = $a['num'];
        $data[ date('Y-m-d',$day1) ]['highest_time'] = date('H:i',$a['ctime']);
        $data[ date('Y-m-d',$day1) ]['lowest_num'] = $b['num'];
        $data[ date('Y-m-d',$day1) ]['lowest_time'] = date('H:i',$b['ctime']);

        $data[ date('Y-m-d',$day2) ]['highest_num'] = $c['num'];
        $data[ date('Y-m-d',$day2) ]['highest_time'] = date('H:i',$c['ctime']);
        $data[ date('Y-m-d',$day2) ]['lowest_num'] = $d['num'];
        $data[ date('Y-m-d',$day2) ]['lowest_time'] = date('H:i',$d['ctime']);

        return $data;
    }
}