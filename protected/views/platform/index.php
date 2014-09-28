<h1>添加平台</h1>
<!-- 状态 -->
<div id="status"></div>

<?php

$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'myForm',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'afterValidate'=>'js:function(form,data,hasError){
                if(!hasError){
                    $.ajax({
                        "type":"POST",
                        "url":"/platform/index",
                        "data":$(form).serialize(),
                        "dataType":"json",
                        "beforeSend":function (XMLHttpRequest){
                            $("#my-form-btn").button("loading");
                        },
                        "success":function(data){
                            if( data.status==1 ){
                                $("#status").html( \'<div class="alert alert-success" role="alert">\'+ data.msg +\' </div>\' );
                                $("input.form-control").val("");
                            }else
                                $("#status").html( \'<div class="alert alert-danger" role="alert">\'+ data.error +\' </div>\' );

                            $("#my-form-btn").button("reset");
                        }
                    });
                    return false;
                }
            }'

        ),
    )
);

echo $form->dropDownListGroup($model, 'belong_plat',array(
    'widgetOptions' => array(
        'data' => array('ios'=>'ios', 'android'=>'android'),
        'htmlOptions' => array(),
    )
));
echo $form->textFieldGroup($model, 'plat_name');
echo $form->textFieldGroup($model, 'plat_id');
echo $form->textFieldGroup($model, 'server_name');
echo $form->textFieldGroup($model, 'server_id');
echo $form->textFieldGroup($model, 'mysql_ip');
echo $form->textFieldGroup($model, 'mysql_account');
echo $form->textFieldGroup($model, 'mysql_password');
echo $form->textFieldGroup($model, 'mysql_dbname');

echo '<div class="row">';
$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType' => 'submit',
        'label' => '添加',
        'htmlOptions'=>array(
            'class'=>'col-md-offset-3 col-md-1 btn-primary',
            'id'=>'my-form-btn',
            'data-loading-text'=>'提交中...',
            'autocomplete'=>'off'
        )
    )
);

$this->endWidget();
echo '</div>';
unset($form);

?>