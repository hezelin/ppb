<h3>☆充值消费排行</h3>
<pre>
   可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
可排序（按首次充值时间，首次消费时间，最后充值时间，最后消费时间，战力，等级，充值金额，消费金额，未登录天数）
可筛选（按开始日期-结束日期做区间，可选择充值或消费，输入任意两个数字做区间）
（排名，账号，角色ID，角色名，等级，战力，充值次数，充值金额，消费金额，元宝存量，银两存量，首次充值时间，最后充值时间，占总充值比率，首次消费时间，最后消费时间，注册时间，最后登录时间，报警）

</pre>

<?php
//print_r($this);		控制器
//print_r($data);		数据
//print_r($index);		索引值
//print_r($widget);		组件类

function getAlarm($last_login_time)
{
    $threeDay = strtotime('-3 days');
    $t = $last_login_time - $threeDay;
    if( $t < 0 ) return '3天前登录';
    else if( $t < 86400 ) return '2天前登录';
    else if( $t < 172800 ) return '1天前登录';
    else if( $t < 259200) return '今天登录';
    else return '时间错误';
}

function getColor($last_login_time)
{
    $threeDay = strtotime('-3 days');
    $t = $last_login_time - $threeDay;

    if( $t < 0 ) return array('style'=>'color:red') ;
    else  return array();
}
$gridColumns = array(
    array(
        'name' => 'rank',
        'value'=>'$row+1',
    ),
    'consume_gold',
    'consume_silver',
    'consume_times',
    'account_name',
    'role_id',
    'role_name',
    'gold',
    'silver',
    array(
        'name'=>'first_consume_time',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'date("Y-m-d H:i",$data->first_consume_time)'
    ),
    array(
        'name'=>'last_consume_time',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'date("Y-m-d H:i",$data->last_consume_time)'
    ),
    array(
        'name'=>'register_time',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'date("Y-m-d H:i",$data->register_time)'
    ),
    array(
        'name'=>'last_login_time',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'date("Y-m-d H:i",$data->last_login_time)'
    ),
    array(
        'name'=>'alarm',
//        'htmlOptions' => getColor($data->last_login_time),
        'value'=>'getAlarm($data->last_login_time)',
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