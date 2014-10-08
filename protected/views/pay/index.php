<h1>对账管理</h1>

<hr>
<?php

$form=$this->beginWidget('booster.widgets.TbActiveForm', array(
    'id'=>'search-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'type' => 'horizontal',
//    以下为 get 专用
    'method'=>'get',
    'action'=>'/pay/index',
));

echo $form->dateRangeGroup($search,'dateRang',array(
    /*'widgetOptions' => array(
        'callback' => 'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}',
    ),*/
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-9',
    ),
    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
    'labelOptions' => array(
        'class' => 'col-sm-2 col-md-1'
    ),
));

echo $form->radioButtonListGroup($search,'platform',array(
    'widgetOptions' => array(
        'data' => DataConfig::$platform,
    ),
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-9',
    ),
    'inline'=>true,
    'labelOptions' => array(
        'class' => 'col-sm-2 col-md-1',
    ),
));


echo $form->textFieldGroup($search,'level',array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-2',
    ),
    'labelOptions' => array(
        'class' => 'col-sm-2 col-md-1'
    ),
));

echo '<div class="row" style="padding-left: 15px">';
$this->widget('booster.widgets.TbButton',array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' => '筛选',
    'htmlOptions'=>array(
        'class'=>'col-md-offset-1 col-md-1',
        'id'=>'my-form-btn',
    )
));

$this->widget('booster.widgets.TbButton',array(
    'buttonType' => 'link',
//    'url' => array('output'),
    'url' => $outputUrl,
    'context' => 'default',
    'label' => '导出',
    'htmlOptions'=>array(
        'class'=>'col-md-1',
        'style'=>'margin-left:15px',
        'id'=>'my-form-btn-output',
    )
));
echo '</div>';

$this->endWidget();
unset($form);
?>


<hr>
<h4> 总充值： <?php echo $total;?> 元&nbsp;&nbsp;&nbsp;此条件总充值： <?php echo $pageTotal;?>元</h4>
<hr>

<?php
$gridColumns = array(
    'agent_id',
    'server_id',
    'account_name',
    'role_id',
    'role_name',
    'level',
    'rmb',
    'order_number',
    array(
        'name'=>'ctime',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'date("Y-m-d H:i",$data->ctime)'
    ),
);

$this->widget('booster.widgets.TbGridView',array(
        'type' => 'striped',
        'dataProvider' => $model,
        'template' => "{summary}\n{items}\n{pager}",
//        'filter' => $model,
        'columns' => $gridColumns,
    )
);
?>
<script>
    //导出按钮
    /*$('#my-form-btn-output').click(function(){
        alert( location.href);
        return false;
    })*/
</script>