<pre>
    ☆等级留存
可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
可筛选（按开始日期-结束日期做区间，显示结果为区间内汇总数据）
（新增注册，等级，等级人数，占比）
 做成图表形式（横坐标为等级，纵坐标为数量&百分比，显示等级人数和占比两条线）

</pre>
<?php

$this->widget(
    'booster.widgets.TbHighCharts',
    array(
        'options' => array(
            'title' => array('text'=>'等级数量&百分比'),
            'xAxis' => array(
                'categories' => $cate
            ),
            'yAxis' => array(
                'title' =>array('text'=>'数量/占比'),
            ),
            'series' => $data
        )
    )
);


$gridColumns = array(
    array(
        'name'=>'level',
        'header'=>'等级'
    ),
    array(
        'name'=>'level_num',
        'header'=>'等级人数'
    ),
    array(
        'name'=>'ratio',
        'header'=>'占比'
    ),
);
$this->widget('booster.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'type' => 'striped',
    'columns' => $gridColumns,
));

?>
