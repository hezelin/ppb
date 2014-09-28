<?php
$this->pageTitle='注册页面---'.Yii::app()->name;
?>

<h2>用户注册</h2>

    <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
        'type'=>'horizontal',
        'id'=>'register-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        /*'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),*/
    )); ?>

    <p class="note">星号 <span class="required">*</span> 是必填选项.</p>

    <?php echo $form->textFieldGroup($model,'name',array( 'placeholder'=>'用于登录')); ?>
    <?php echo $form->textFieldGroup($model,'trueName',array( 'placeholder'=>'请输入你的真实姓名' ,'enableAjaxValidation'=>false)); ?>
    <?php echo $form->passwordFieldGroup($model,'setpswd',array( 'placeholder'=>'6-16位字符','enableAjaxValidation'=>false));?>
    <?php echo $form->passwordFieldGroup($model,'acpswd',array('enableAjaxValidation'=>false));?>


<?php if(CCaptcha::checkRequirements()): ?>
    <?php echo $form->captchaGroup($model,'verifyCode',array(),array(
        'enableAjaxValidation'=>false,
        'widgetOptions' => array(
            'htmlOptions' => array(
                'style' => 'width:20%;display:inline',
            ),
        )
    )); ?>
<?php endif; ?>

    <div class="form-actions">
        <?php $this->widget('booster.widgets.TbButton',array(
            'buttonType'=>'submit',
            'context'=>'primary',
            'label'=>'注册',
            'htmlOptions'=>array(
                'class'=>'col-md-offset-3 col-md-1',
                'id'=>'my-form-btn',
            )
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
<?php unset($form);?>

