<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" href="/css/styles.css" />
</head>

<body>

<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'brand' => Yii::app()->name,
        'fixed' => 'top',
        'fluid' => true,
        'type'=>'inverse',
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label'=>'Home', 'url'=>array('/site/index')),
                    array('label' => '激活码','url'=>array('/activation/index')),
                )
            ),
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label'=>'登录', 'url'=>Yii::app()->user->loginUrl, 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'欢迎您,'.Yii::app()->user->name, 'url'=>array('/user/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'退出', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
                )
            )
        )
    )
);
?>

<div style="height: 50px"></div>

<div class="row-fluid">
    <div class="col-md-2">
    <?php

    $this->widget(
        'booster.widgets.TbMenu',
        array(
            'type' => 'list',
            'items' => array(
                array('label' => '激活码操作'),
                array('label' => '激活码创建', 'url' => '/activation/index'),
                array('label' => '激活码列表', 'url' => '/activation/list'),
                array('label' => '激活码接口', 'url' => '/activation/port'),
                '',
                array('label' => '服务器操作'),
                array('label' => '添加服务器', 'url' => '/platform/index'),
                array('label' => '服务器列表', 'url' => '/platform/list'),
                '',
                array('label' => '充值与消费'),
                array('label' => '对账管理', 'url' => '/pay/index'),
                array('label' => '充值消费排行', 'url' => '/pay/ranking'),
                array('label' => '充值情况总览', 'url' => '/pay/status'),
                array('label' => 'LTV', 'url' => '/pay/ltv'),
                array('label' => '每月充值统计', 'url' => '/pay/statistics'),
                array('label' => '等级充值情况', 'url' => '/pay/lvStatus'),
                array('label' => '充值补单系统', 'url' => '/pay/addOrder'),
                '',
                array('label' => '数据分析'),
                array('label' => '玩家在线数据', 'url' => '/analysis/online'),
                array('label' => '分时注册统计', 'url' => '/analysis/timeRegister'),
                array('label' => 'VIP管理', 'url' => '/analysis/vip'),
                array('label' => '用户留存', 'url' => '/analysis/userRemain'),
                array('label' => '等级留存', 'url' => '/analysis/lvRemain'),
                array('label' => '流失分析', 'url' => '/analysis/runAway'),
                array('label' => '消费统计', 'url' => '/analysis/consume'),
                array('label' => '玩家情况总览', 'url' => '/analysis/index'),
                array('label' => '商城消耗统计', 'url' => '/analysis/shop'),
                '',
                array('label' => '玩家信息查询'),
                array('label' => '玩家详细信息', 'url' => '/player/info'),
                array('label' => '玩家邮件查询', 'url' => '/player/mail'),
                array('label' => '玩家关系查询', 'url' => '/player/relation'),
                array('label' => '物品流通查询', 'url' => '/player/good'),
                '',
                array('label' => '玩家信息修改'),
                array('label' => '玩家传送', 'url' => '/playerEditor/transfer'),
                array('label' => '设置GM', 'url' => '/playerEditor/setGM'),
                array('label' => '玩家任务管理', 'url' => '/playerEditor/task'),
                array('label' => '封禁账号、IP、禁言', 'url' => '/playerEditor/forbid'),
                array('label' => '物品发放', 'url' => '/playerEditor/issueGood'),
                array('label' => '全服补偿', 'url' => '/playerEditor/compensate'),
                array('label' => '玩家物品删除', 'url' => '/playerEditor/delGood'),
                array('label' => '玩家邮件删除', 'url' => '/playerEditor/delMail'),
                array('label' => '宠物解锁', 'url' => '/playerEditor/petRelieve'),
                array('label' => '玩家基础信息修改', 'url' => '/playerEditor/infoAlter'),
                '',
                array('label' => '公告管理'),
                array('label' => '弹出公告', 'url' => '/notice/index'),
                array('label' => '发送系统邮件', 'url' => '/notice/mail'),
                array('label' => '轮播公告', 'url' => '/notice/position'),
                '',

//          index mail position
            )
        )
    );
    ?>
        <!--<div class="list-group">
            <a href="/activation/index" class="list-group-item active">激活码创建</a>
            <a href="/activation/list" class="list-group-item">激活码列表</a>
            <a href="/activation/check" class="list-group-item">激活码接口</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>-->

    </div>

    <div class="col-md-10">
        <?php echo $content; ?>
    </div>
</div>




<div class="row-fluid">
    <div class="col-md-12">
	<div class="container" id="footer">
        <br/>
        <p></p>
		Copyright &copy; <?php echo date('Y'); ?> by Harry.<br/>
		联系：QQ 730107711
	</div>
    </div>
</div>

</body>
</html>