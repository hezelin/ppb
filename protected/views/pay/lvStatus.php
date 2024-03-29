<h1>☆等级充值情况</h1>
<pre>

可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
可筛选（按开始日期-结束日期做区间，可选择充值金额或等级，输入任意两个数字做区间）
横向（等级，充值人数，充值金额，等级充值情况）
纵向（在等级一列最下面添加一项：汇总）
等级充值情况做成图表形式（横坐标为等级，纵坐标为数量，充值人数和充值金额两条线）

</pre>
<?php
$gridColumns = array(

    array(
        'name'=>'level',
        'header' => '等级',
    ),
    'agent_id',
    'server_id',
    array(
        'name'=>'pay_num',
        'header' => '充值次数',
    ),
    array(
        'name'=>'pay_money',
        'header' => '充值金额',
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