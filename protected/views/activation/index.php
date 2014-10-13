<h1>创建激活码</h1>
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
                        "url":"/activation/index",
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

echo $form->textFieldGroup($model, 'id');
echo $form->textFieldGroup($model, 'total');
echo $form->textFieldGroup($model, 'tips');
echo '<div class="row" style="padding-left: 20px">';
$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType' => 'submit',
        'label' => '创建',
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