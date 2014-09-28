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
        'fluid' => false,
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
                    array('label'=>'注册', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'欢迎您,'.Yii::app()->user->name, 'url'=>array('/user/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'退出', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
                )
            )
        )
    )
);
?>

<div style="height: 50px"></div>

<div class="container">

<div class="row">
    <div class="col-md-12">
        <?php echo $content; ?>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
	<div id="footer">
        <br/>
        <p></p>
		Copyright &copy; <?php echo date('Y'); ?> by Harry.<br/>
		联系：QQ 730107711
	</div>
    </div>
</div>

</div><!-- end container -->
</body>
</html>