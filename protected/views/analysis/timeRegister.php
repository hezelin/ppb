<pre>
    ☆分时注册统计
可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
可筛选（按开始日期-结束日期做区间）
总注册账号（当前服务器内总注册账号数）
总角色数（当前服务器内总角色数）
做成图表形式（横坐标为小时，纵坐标为数量，注册角色数和账号数两条线）
横向（日期，小时，注册角色数，注册账号数）
纵向（在日期最下面添加一项：汇总-小时除外）

</pre>

<hr>
总注册账号 <?php echo $total['account'];?> , 总注册角色 <?php echo $total['role'];?>
<hr>

<?php
$this->widget(
    'booster.widgets.TbHighCharts',
    array(
        'options' => array(
            'title' => array('text'=>'分时注册统计'),
            'xAxis' => array(
                'categories' => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)
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
$gridColumns = array(
    'date',
    'hour',
    'role_num',
    'account_num',
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