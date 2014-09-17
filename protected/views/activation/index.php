<h1>创建激活码</h1>

<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'verticalForm',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'), // for inset effect
    )
);

echo $form->textFieldGroup($model, 'id');
echo $form->textFieldGroup($model, 'total');
echo $form->textFieldGroup($model, 'tips');
echo '<div class="row">';
$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType' => 'submit',
        'label' => '创建',
        'htmlOptions'=>array('class'=>'col-md-offset-3 col-md-1 btn-primary')
    )
);

$this->endWidget();
echo '</div>';
unset($form);

?>