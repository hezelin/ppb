<h1>☆每月充值统计</h1>
<pre>

可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
可筛选（按开始日期-结束日期做区间）
所有统计基数单位以月计
横向（X年X月，注册，活跃，充值人数，充值次数，注册ARPU，ARPPU，付费率，充值金额）
纵向（在日期一列最下面添加两项：平均，汇总-活跃除外）

</pre>

<?php

function fm($a,$b)
{
    if(!$b) return '0.00';
    return number_format($a/ $b,2);
//    return round($a/$b,2);
}

$gridColumns = array(

    array(
        'name'=>'month',
        'header' => '日期',
    ),
    array(
        'name'=>'reg_num',
        'header' => '注册人数',
    ),
    array(
        'name'=>'login_num',
        'header' => '活跃人数',
    ),
    array(
        'name'=>'pay_num',
        'header' => '充值次数',
    ),
    array(
        'name'=>'pay_times',
        'header' => '充值次数',
    ),
    array(
        'name'=>'pay_money',
        'header' => '充值金额',
    ),
    array(
        'name'=>'pay_ratio',
        'header' => '付费率',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'fm($data["pay_num"],$data["login_num"])',
    ),
    array(
        'name'=>'arppu',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'fm($data["pay_money"],$data["pay_num"])'
    ),
    array(
        'name'=>'arpu',
        'header' => '注册arpu',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'fm($data["reg_pay_money"],$data["reg_num"])'
    ),

);

$this->widget('booster.widgets.TbGridView',array(
        'type' => 'striped',
        'dataProvider' => $dataProvider,
        'template' => "{summary}\n{items}\n{pager}",
//        'filter' => $model,
        'columns' => $gridColumns,
    )
);
