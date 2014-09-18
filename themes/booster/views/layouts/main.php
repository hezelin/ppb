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
                array('label' => '平台操作'),
                array('label' => '添加平台', 'url' => '/platform/index'),
                array('label' => '平台列表', 'url' => '/platform/list'),
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