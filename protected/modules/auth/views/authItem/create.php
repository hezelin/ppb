<?php
/* @var $this OperationController|TaskController|RoleController */
/* @var $model AuthItemForm */
/* @var $form TbActiveForm */

$this->breadcrumbs = array(
	$this->capitalize($this->getTypeText(true)) => array('index'),
	Yii::t('AuthModule.main', 'New {type}', array('{type}' => $this->getTypeText())),
);
?>

<h1><?php echo Yii::t('AuthModule.main', 'New {type}', array('{type}' => $this->getTypeText())); ?></h1>

<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'type'=>'horizontal',
    'htmlOptions' => array('class' => 'well'),
)); ?>

<?php echo $form->hiddenField($model, 'type'); ?>
<?php echo $form->textFieldGroup($model, 'name',array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-4',
        )
)); ?>
<?php echo $form->textFieldGroup($model, 'description',array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-4',
        )
)); ?>

<div class="row">
	<?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => Yii::t('AuthModule.main', 'Create') ,
            'htmlOptions'=>array(
                'class'=>'col-md-offset-3 col-md-1',
                'id'=>'my-form-btn',
            )
        ));
        $this->widget('TbButton', array(
//            'type' => 'link',
            'label' => Yii::t('AuthModule.main', 'Cancel'),
            'url' => array('index'),
        ));
    ?>
</div>

<?php $this->endWidget(); ?>
