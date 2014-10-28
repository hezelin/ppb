<pre>
    ☆VIP管理
可以导出数据
可选择平台：iOS或安卓
可选择各渠道，如：91、360、小米、UC、PP、iTools 等
VIP概况
可筛选（按开始日期-结束日期做区间统计，可选择VIP等级/游戏等级，输入任意两个数字做区间）
VIP总数（当前服务器内VIP总数）
横向（VIP等级，VIP人数，占比，游戏等级，3天以上未登录，7天以上未登录，15天以上未登录，30天以上未登录）
纵向（在VIP等级最下面添加一项：汇总-占比和游戏等级除外）
做成图表形式（横坐标为游戏等级，纵坐标为数量，VIP等级和人数两条线）
VIP详情
可筛选（可选择VIP等级/游戏等级，输入任意两个数字做区间）
（账号，ID，角色名，职业，VIP等级，游戏等级，战斗力，消费元宝，充值元宝，最后充值时间，最后消费时间，最后登录时间）

</pre>
<div style="color: #ff0000">VIP等级，VIP人数，占比，游戏等级，3天以上未登录，7天以上未登录，15天以上未登录，30天以上未登录）
    <br/>应该是 3天内登录吧</div>
<?php

$this->widget(
    'booster.widgets.TbTabs',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array(
                'label' => 'VIP 等级查询',
                'content' => '',
                'url'=>'vip',
            ),
            array(
                'label' => 'VIP 等级统计',
                'content' => '',
                'active' => true
            ),
        ),
    )
);

$gridColumns = array(
    array(
        'name'=>'vip',
        'header'=>'VIP等级'
    ),
    array(
        'name'=>'vip_num',
        'header'=>'VIP人数'
    ),
    array(
        'name'=>'agent_id',
        'header'=>'平台'
    ),
    array(
        'name'=>'3days',
        'header'=>'3天内登录'
    ),
    array(
        'name'=>'7days',
        'header'=>'7天内登录'
    ),
    array(
        'name'=>'15days',
        'header'=>'15天内登录'
    ),
    array(
        'name'=>'30days',
        'header'=>'30天内登录'
    )
);
$this->widget('booster.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    'type' => 'striped',
    'columns' => $gridColumns,
));
