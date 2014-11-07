<?php
$gridColumns = array(
    array(
        'name'=>'order',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新排序',
            'url' => '/server/editable',
        )
    ),
    'agent_id',
    'agent_name',
    'server_id',
    'server_name',
    'ip',
    'port',
    array(
        'name'=>'create_time',
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'value'=>'date("Y-m-d H:i",$data->create_time)'
    ),
    array(
        'name'=>'is_open',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:100px'),
        'editable' => array(
            'type' => 'select',
            'title'=> '更改开启',
            'url' => '/server/editable',
            'source'=> array(
                '1'=>'开启',
                '0'=>'关闭'
            )
        )
    ),
    array(
        'name'=>'is_show',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:100px'),
        'editable' => array(
            'type' => 'select',
            'title'=> '更改显示',
            'url' => '/server/editable',
            'source'=> array(
                '1'=>'显示',
                '0'=>'关闭'
            )
        )
    ),
    array(
        'name'=>'is_recommend',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:100px'),
        'editable' => array(
            'type' => 'select',
            'title'=> '设置推荐',
            'url' => '/server/editable',
            'source'=> array(
                '1'=>'推荐',
                '0'=>'默认'
            )
        )
    ),
    array(
        'name'=>'status',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'select',
            'title'=> '更改状态',
            'url' => '/server/editable',
            'source'=> array(
                '-2'=>'未开启','-1'=>'维护中','0'=>'正常','1'=>'火爆','2'=>'新服','3'=>'新服(火爆)','5'=>'推荐','6'=>'首推','7'=>'爆满'
            )
        )
    ),
    array(
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'header'=>'操作',
        'class'=>'booster.widgets.TbButtonColumn',
        'template'=>'{update} &nbsp; {delete}',
        'updateButtonUrl'=>'Yii::app()->createUrl("server/update",array("id"=>$data->id))',
        'deleteButtonUrl'=>'Yii::app()->createUrl("server/delete",array("id"=>$data->id))',
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