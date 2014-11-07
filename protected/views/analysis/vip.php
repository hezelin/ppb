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

<div class="row">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:void(0)">VIP 等级查询</a></li>
        <li>
            <a href="vipLevel">VIP 等级统计</a>
        </li>
    </ul>
</div>


<?php
$gridColumns = array(
    'role_id',
    'role_name',
    'account_name',
    'vip_level',
    'silver',
    'gold',
    'reg_date',
    'last_login_time',

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