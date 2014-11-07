<div class="row">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:void(0)">在线数据</a></li>
        <li>
            <a href="online/type/history">历史数据</a>
        </li>
    </ul>
</div>

<h2>开始时间:<?php echo $day1;?>&nbsp;&nbsp;结束时间:<?php echo $day2;?></h2>
<div class="row">
    <?php foreach($dayData as $d=>$v):?>
        <P><?php echo $d;?> &nbsp;&nbsp;当天最高在线人数：<?php echo $v['highest_num'];?>，时间：<?php echo $v['highest_time'];?>
            当天最低在线人数：<?php echo $v['lowest_num'];?>，时间：<?php echo $v['lowest_time'];?></P>
    <?php endforeach;?>
</div>
<div style="width: 6000px">
<?php

$this->widget(
    'booster.widgets.TbHighCharts',
    array(
        'options' => array(
            'title' => array('text'=>'2天数据对比'),
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


?>
</div>