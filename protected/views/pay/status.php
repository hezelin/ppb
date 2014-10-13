<h3>☆充值情况总览</h3>
<pre>

可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
可筛选（按开始日期-结束日期做区间）
横向（日期，注册，活跃，付费率，注册付费率，ARPPU，注册ARPU，充值次数，充值人数，新增充值人数，注册充值人数，注册充值金额，新增充值金额，充值金额）
纵向（在日期一列最下面添加两项：平均，汇总）

</pre>

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

$gridColumns = array(

    'date',
    'agent_id',
    'server_id',
    'reg_num',
    'login_times',
    'login_num',
    'pay_times',
    'pay_num',
    'pay_money',
    'first_pay_num',
    'first_pay_money',
    'reg_pay_num',
    'reg_pay_money',
    array(
        'name'=>'pay_ratio',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'fm($data->pay_num,$data->login_num)',
    ),
    array(
        'name'=>'reg_pay_ratio',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'fm($data->reg_pay_num,$data->reg_num)'
    ),
    array(
        'name'=>'arppu',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'fm($data->pay_money,$data->pay_num)'
    ),
    array(
        'name'=>'arpu',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'fm($data->reg_pay_money,$data->reg_num)'
    ),
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