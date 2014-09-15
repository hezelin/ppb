<?php
$gridColumns = array(
    'id',
    'total',
    array(
//        'class'=>'form-control'
        'name'=>'tips',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/activation/editable',
        )
    ),
    array(
        'name'=>'create_time',
        'value'=>'date("Y-m-d H:i",$data->create_time)'
    ),
    array(
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'header'=>'操作',
        'class'=>'booster.widgets.TbButtonColumn',
        'template'=>'{view}',
        'viewButtonUrl'=>'Yii::app()->createUrl("activation/view",array("code_id"=>$data->id))',
    )

);

$this->widget('booster.widgets.TbGridView',array(
        'type' => 'striped',
        'dataProvider' => $model->search(),
        'template' => "{summary}\n{items}\n{pager}",
        'filter' => $model,
        'columns' => $gridColumns,
    )
);
?>