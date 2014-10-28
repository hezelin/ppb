<pre>
    ☆玩家情况总览
可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
以上选择平台和渠道时，仅需对（新增账号/角色，各项活跃数据）进行统计区分
可排序（按日期做升降排序）
可筛选（按开始日期-结束日期做区间）
（平台，服务器，日期，星期，平均在线，最小在线，最高在线，新增账号，新增角色，平均在线（分），活跃角色，周活跃角色，月活跃角色，登录人次，登录频率，创角率）

</pre>

<p> 周活跃角色  =  起始时间的一周时间内登录人数，同理 月活跃角色</p>
<?php
//$row 行数

/*
 * 返回比例，保留2位精度
 */
function fm($a,$b)
{
    if(!$b) return '0.00';
    return number_format($a/ $b,2);
//    return round($a/$b,2);
}

function getWeek($date)
{
//    return date('w',$date);
    $weekArray=array("日","一","二","三","四","五","六");
    return '星期'.$weekArray[date('w',strtotime($date))];
}

$gridColumns = array(

    'date',
    'agent_id',
    'server_id',
    array(
        'name'=>'week',
        'header'=>'星期',
        'value'=>'getWeek($data->date)',
    ),
    array(
        'name'=>'reg_num',
        'header'=>'新增注册',
    ),
    array(
        'name'=>'login_times',
        'header'=>'登录人次',
    ),
    array(
        'name'=>'login_ratio',
        'header'=>'登录频率',
        'value'=>'fm($data->login_times,$data->login_num)',
    ),
    array(
        'name'=>'login_num',
        'header'=>'活跃角色',
    ),
    array(
        'name'=>'login_num_week',
        'header'=>'周活跃角色',
    ),
    array(
        'name'=>'login_num_month',
        'header'=>'月活跃角色',
    ),
    array(
        'name'=>'aver_online',
        'header'=>'平均在线',
    ),
    array(
        'name'=>'lower_online',
        'header'=>'最低在线',
    ),
    array(
        'name'=>'higher_online',
        'header'=>'最高在线',
    )
);

$this->widget('booster.widgets.TbGridView',array(
        'type' => 'striped',
        'dataProvider' => $model,
        'template' => "{summary}\n{items}\n{pager}",
//        'filter' => $model,
        'columns' => $gridColumns,
    )
);
?>