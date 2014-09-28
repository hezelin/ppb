<?php
$this->pageTitle='登录 - '.Yii::app()->name;
?>

<h1>登录</h1>

<?php

$form=$this->beginWidget('booster.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));

echo $form->textFieldGroup($model,'username');
echo $form->passwordFieldGroup($model,'password');
echo $form->checkboxGroup($model,'rememberMe');

$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => '登录',
        'htmlOptions'=>array(
            'class'=>'col-md-1',
            'id'=>'my-form-btn',
        )
    )
);
$this->endWidget();
unset($form);
?>
