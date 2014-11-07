
<div class="row">
    <ul class="nav nav-tabs">
        <li>
            <a href="/analysis/online">在线数据</a></li>
        <li class="active">
            <a href="javascript:void(0)">历史数据</a>
        </li>
    </ul>
</div>


<h2>开始时间:<?php echo date('Y-m-d',$day1);?>&nbsp;&nbsp;结束时间:<?php echo date('Y-m-d',$day2);?></h2>

<?php

$this->widget(
    'booster.widgets.TbHighCharts',
    array(
        'options' => array(
            'title' => array('text'=>'历史在线数据'),
            'xAxis' => array(
                'categories' => $cate
            ),
            'yAxis' => array(
                'title' =>array('text'=>'在线人数'),
            ),
            'series' => $data
        )
    )
);


$gridColumns = array(
    array(
        'name'=>'date',
        'header'=>'日期'
    ),
    array(
        'name'=>'height_num',
        'header'=>'最高在线'
    ),
    array(
        'name'=>'aver_num',
        'header'=>'平均在线'
    ),
    array(
        'name'=>'lower_num',
        'header'=>'最低在线'
    ),
);
$this->widget('booster.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'type' => 'striped',
    'columns' => $gridColumns,
));

?>
