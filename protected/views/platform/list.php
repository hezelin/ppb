<?php
$gridColumns = array(
    'id',
    array(
        'name'=>'plat_name',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'plat_url',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'plat_server',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'mysql_ip',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'mysql_account',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'mysql_password',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'mysql_dbname',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'create_time',
        'value'=>'date("Y-m-d H:i",$data->create_time)'
    ),
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