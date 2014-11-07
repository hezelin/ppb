<pre>
    ☆用户留存
可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
可筛选（按开始日期-结束日期做区间）
（日期、星期、新增注册、第1日~第30日每天留存数据和第40、50、60天留存数据）
 做成图表形式（横坐标为日期，纵坐标为数量&百分比，显示新增注册和第1日留存两条线）

</pre>
<?php
$this->widget(
    'booster.widgets.TbHighCharts',
    array(
        'options' => array(
            'title' => array('text'=>'用户留存'),
            'xAxis' => array(
                'categories' => $cate
            ),
            'yAxis' => array(
                'title' =>array('text'=>'数量'),
            ),
            /*'series' => array(
                [
                    'name' => '2014-10-15',
                    'data' => [1, 2, 3, 4, 5, 1, 2, 1, 4, 3, 1, 5]
                ]
            )*/
            /*'series'=>array(
                array('name'=>'注册账号数','data'=>array(1,2,3,4,5,3,2,1,7,9,11,3,6)),
            )*/

            'series'=>$data,
        )
    )
);
?>

<?php
function fm($num,$ratio)
{
    return $ratio.'('.number_format( $num*$ratio,0).')';
}

$gridColumns = array(
    array(
        'name'=>'date',
//        'htmlOption'=>array('nowrap'=>'nowrap'),
    ),
    'week',
    'new_num',
    array('name'=>'day1','value'=>'fm($data["new_num"],$data["day1"])'),
    array('name'=>'day2','value'=>'fm($data["new_num"],$data["day2"])'),
    array('name'=>'day3','value'=>'fm($data["new_num"],$data["day3"])'),
    array('name'=>'day4','value'=>'fm($data["new_num"],$data["day4"])'),
    array('name'=>'day5','value'=>'fm($data["new_num"],$data["day5"])'),
    array('name'=>'day6','value'=>'fm($data["new_num"],$data["day6"])'),
    array('name'=>'day7','value'=>'fm($data["new_num"],$data["day7"])'),
    array('name'=>'day8','value'=>'fm($data["new_num"],$data["day8"])'),
    array('name'=>'day9','value'=>'fm($data["new_num"],$data["day9"])'),
    array('name'=>'day10','value'=>'fm($data["new_num"],$data["day10"])'),
    array('name'=>'day11','value'=>'fm($data["new_num"],$data["day11"])'),
    array('name'=>'day12','value'=>'fm($data["new_num"],$data["day12"])'),
    array('name'=>'day13','value'=>'fm($data["new_num"],$data["day13"])'),
    array('name'=>'day14','value'=>'fm($data["new_num"],$data["day14"])'),
    array('name'=>'day15','value'=>'fm($data["new_num"],$data["day15"])'),
    array('name'=>'day16','value'=>'fm($data["new_num"],$data["day16"])'),
    array('name'=>'day17','value'=>'fm($data["new_num"],$data["day17"])'),
    array('name'=>'day18','value'=>'fm($data["new_num"],$data["day18"])'),
    array('name'=>'day19','value'=>'fm($data["new_num"],$data["day19"])'),
    array('name'=>'day20','value'=>'fm($data["new_num"],$data["day20"])'),
    array('name'=>'day21','value'=>'fm($data["new_num"],$data["day21"])'),
    array('name'=>'day22','value'=>'fm($data["new_num"],$data["day22"])'),
    array('name'=>'day23','value'=>'fm($data["new_num"],$data["day23"])'),
    array('name'=>'day24','value'=>'fm($data["new_num"],$data["day24"])'),
    array('name'=>'day25','value'=>'fm($data["new_num"],$data["day25"])'),
    array('name'=>'day26','value'=>'fm($data["new_num"],$data["day26"])'),
    array('name'=>'day27','value'=>'fm($data["new_num"],$data["day27"])'),
    array('name'=>'day28','value'=>'fm($data["new_num"],$data["day28"])'),
    array('name'=>'day29','value'=>'fm($data["new_num"],$data["day29"])'),
    array('name'=>'day30','value'=>'fm($data["new_num"],$data["day30"])'),
    array('name'=>'day40','value'=>'fm($data["new_num"],$data["day40"])'),
    array('name'=>'day50','value'=>'fm($data["new_num"],$data["day50"])'),
    array('name'=>'day60','value'=>'fm($data["new_num"],$data["day60"])'),
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