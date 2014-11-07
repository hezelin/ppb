<h1>创建服务器</h1>
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
                        "url":"/server/update/'.$model->id.'",
                        "data":$(form).serialize(),
                        "dataType":"json",
                        "beforeSend":function (XMLHttpRequest){
                            $("#my-form-btn").button("loading");
                        },
                        "success":function(data){
                            if( data.status==1 ){
                                $("#status").html( \'<div class="alert alert-success" role="alert">\'+ data.msg +\' </div>\' );
                                location.href = "/server/list";
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

echo $form->textFieldGroup($model, 'agent_id');
echo $form->textFieldGroup($model, 'agent_name');
echo $form->textFieldGroup($model, 'server_id');
echo $form->textFieldGroup($model, 'server_name');
echo $form->textFieldGroup($model, 'ip');
echo $form->textFieldGroup($model, 'port');

echo $form->switchGroup($model, 'is_open');
echo $form->switchGroup($model, 'is_show');

echo $form->dropDownListGroup(
    $model,
    'status',
    array(
        /*'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),*/
        'widgetOptions' => array(
            'data' => array('-2'=>'未开启','-1'=>'维护中','0'=>'正常','1'=>'火爆','2'=>'新服','3'=>'新服(火爆)','5'=>'推荐','6'=>'首推','7'=>'爆满'),
            'htmlOptions' => array(),
        )
    )
);

echo $form->textFieldGroup($model, 'order');
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