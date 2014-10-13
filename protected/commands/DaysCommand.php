<?php

/**
 * 每天统计任务
 * 充值、注册、登录 统计
 * 涉及 2个表
 */

class DaysCommand extends CConsoleCommand
{

    /*
     * 此命令的帮助信息
     * windows cmd 命令 ： yiic help days
     * linux 命令 ： ./yiic help days
     */
    public function getHelp()
    {
        return 'this is the payinfo help';
    }

    /*
     * 每日充值统计，
     * 日期，注册，活跃，付费率，注册付费率，ARPPU，注册ARPU，充值次数，充值人数，新增充值人数，注册充值人数，注册充值金额，新增充值金额，充值金额
     * 用于 “充值情况总览” 菜单
     * 执行单一任务，直接run,无需 actionXXX
     * @parma $day 指定日期 ’2014-10-10‘
     * windows cmd 命令 ： yiic days payinfo
     * linux 命令 ： ./yiic days payinfo
     */

    public function actionAllCount($day='')
    {
        if(!$day) $day = date('Y-m-d',time());
        $this->actionLoginCount($day);
        $this->actionPayCount($day);
        $this->actionRegCount($day);
        $this->actionTodayRegPay($day);
        $this->actionFirstPayCount($day);
    }

    public function actionPayCount($day = '')
    {
        if($day)
        {
            $start = strtotime($day);
            $end = $start+86399;

            $data = Yii::app()->db->createCommand()
                ->select('sum(`rmb`)as pay_money,count(`role_id`) as pay_times,count(distinct `role_id`) as pay_num,agent_id,server_id,
                    from_unixtime(`ctime`,\'%Y-%m-%d\') as `date`
                ')
                ->from('base_pay')
                ->where('ctime between :start and :end',array(':start'=>$start,':end'=>$end))
                ->group('agent_id,server_id,date')
                ->queryAll();
        }
        else
        {
            $data = Yii::app()->db->createCommand()
                ->select('sum(`rmb`)as pay_money,count(`role_id`) as pay_times,count(distinct `role_id`) as pay_num,agent_id,server_id,
                    from_unixtime(`ctime`,\'%Y-%m-%d\') as `date`
                ')
                ->from('base_pay')
                ->group('agent_id,server_id,date')
                ->queryAll();
        }
        if($data)
        {
            $values = '';
            foreach($data as $r)
                $values .= "('{$r['date']}',{$r['agent_id']},{$r['server_id']},{$r['pay_money']},{$r['pay_times']},{$r['pay_num']}),";
            $values = substr($values,0,-1);

            $sql = "insert into cron_days_count (`date`,`agent_id`,`server_id`,`pay_money`,`pay_times`,`pay_num`) values {$values} ON DUPLICATE KEY UPDATE
                    `pay_money`=values(`pay_money`),`pay_times`=values(`pay_times`),`pay_num`=values(`pay_num`)";
            Yii::app()->db->createCommand($sql)->execute();
        }
    }

    /*
     * 统计注册人数
     */
    public function actionRegCount($day='')
    {
        if($day)
        {
            $start = strtotime($day);
            $end = $start+86399;
            $data = Yii::app()->db->createCommand()
                ->select('count(`role_id`) as reg_num,agent_id,server_id,
                    from_unixtime(`reg_date`,\'%Y-%m-%d\') as `date`
                ')
                ->from('p_role_base')
                ->where('reg_date between :start and :end',array(':start'=>$start,':end'=>$end))
                ->group('agent_id,server_id,date')
                ->queryAll();
        }
        else
        {
            $data = Yii::app()->db->createCommand()
                ->select('count(`role_id`) as reg_num,agent_id,server_id,
                    from_unixtime(`reg_date`,\'%Y-%m-%d\') as `date`
                ')
                ->from('p_role_base')
                ->group('agent_id,server_id,date')
                ->queryAll();
        }
        if($data)
        {
            $values = '';
            foreach($data as $r)
                $values .= "('{$r['date']}',{$r['agent_id']},{$r['server_id']},{$r['reg_num']}),";
            $values = substr($values,0,-1);

            $sql = "insert into cron_days_count (`date`,`agent_id`,`server_id`,`reg_num`) values {$values} ON DUPLICATE KEY UPDATE
                    `reg_num`=values (`reg_num`)";
            Yii::app()->db->createCommand($sql)->execute();
        }
    }

    /*
     * 统计登录人数(活跃人数）去重
     * 由于需要时间段，所以需要知道日期
     */
    public function actionLoginCount($day='')
    {
        if($day)
        {
            $start = strtotime($day);
            $end = $start+86399;

            $data = Yii::app()->db->createCommand()
                ->select('count(distinct `log_in_out`.`role_id`) as login_num, count(`log_in_out`.`role_id`) as `login_times`,agent_id,server_id')
                ->from('log_in_out')
                ->leftJoin('p_role_base','p_role_base.role_id=log_in_out.role_id')
                ->where('in_time < :end and ( out_time > :start or out_time = 0 ) ',array(':start'=>$start,':end'=>$end))
                ->group('agent_id,server_id')
                ->queryAll();
            if($data)
            {
                $values = '';
                foreach($data as $r)
                    $values .= "('{$day}',{$r['agent_id']},{$r['server_id']},{$r['login_num']},{$r['login_times']}),";
                $values = substr($values,0,-1);

                $sql = "insert into cron_days_count (`date`,`agent_id`,`server_id`,`login_num`,`login_times`) values {$values} ON DUPLICATE KEY UPDATE
                        `login_num`=values(`login_num`),`login_times`=values (`login_times`)";
                Yii::app()->db->createCommand($sql)->execute();
            }
        }
    }

    /*
     * 当天注册多少人充值
     */
    public function actionTodayRegPay($day='')
    {
        if($day)
        {
            $start = strtotime($day);
            $end = $start+86399;

            $data = Yii::app()->db->createCommand()
                ->select('sum(`rmb`)as reg_pay_money,count(distinct `base_pay`.`role_id`) as reg_pay_num, base_pay.agent_id, base_pay. server_id,
                    from_unixtime(`ctime`,\'%Y-%m-%d\') as `date`
                ')
                ->from('base_pay')
                ->leftJoin('p_role_base','p_role_base.role_id=base_pay.role_id')
                ->where('ctime between :start and :end and reg_date between :start and :end',array(':start'=>$start,':end'=>$end))
                ->group('base_pay.agent_id,base_pay.server_id,date')
                ->queryAll();

            if($data)
            {
                $values = '';
                foreach($data as $r)
                    $values .= "('{$r['date']}',{$r['agent_id']},{$r['server_id']},{$r['reg_pay_money']},{$r['reg_pay_num']}),";
                $values = substr($values,0,-1);

                $sql = "insert into cron_days_count (`date`,`agent_id`,`server_id`,`reg_pay_money`,`reg_pay_num`) values {$values} ON DUPLICATE KEY UPDATE
                       reg_pay_money=values(reg_pay_money), reg_pay_num=values(reg_pay_num)";
                Yii::app()->db->createCommand($sql)->execute();
            }
        }
    }

    /*
     * 首次充值统计
     * first_pay_money,first_pay_num
     */
    public function actionFirstPayCount($day='')
    {
        if($day)
        {
            $start = strtotime($day);
            $end = $start+86399;

            $data = Yii::app()->db->createCommand()
                ->select('sum(`rmb`)as first_pay_money,count(distinct `role_id`)as first_pay_num, base_pay.agent_id, base_pay. server_id,
                    from_unixtime(`ctime`,\'%Y-%m-%d\') as `date`
                ')
                ->from('base_pay')
                ->where('ctime between :start and :end',array(':start'=>$start,':end'=>$end))
                ->andWhere('role_id not in ( select role_id from base_pay where ctime < :before )',array(':before'=>$start))
                ->group('base_pay.agent_id,base_pay.server_id,date')
                ->queryAll();

            if($data)
            {
                $values = '';
                foreach($data as $r)
                    $values .= "('{$r['date']}',{$r['agent_id']},{$r['server_id']},{$r['first_pay_money']},{$r['first_pay_num']}),";
                $values = substr($values,0,-1);

                $sql = "insert into cron_days_count (`date`,`agent_id`,`server_id`,`first_pay_money`,`first_pay_num`) values {$values} ON DUPLICATE KEY UPDATE
                       first_pay_money=values(first_pay_money),first_pay_num=values(first_pay_num)";
                Yii::app()->db->createCommand($sql)->execute();
            }
        }
    }
} 