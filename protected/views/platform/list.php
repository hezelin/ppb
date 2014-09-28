<?php
$gridColumns = array(
    array(
        'name'=>'belong_plat',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'select',
            'title'=> '修改平台',
            'url' => '/platform/editable',
            'source'=> array(
                'ios'=>'ios',
                'android'=>'android'
            )
        )
    ),
    array(
        'name'=>'plat_id',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新id',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'belong_plat',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'select',
            'title'=> '输入新名称',
            'url' => '/platform/editable',
            'source'=> array(
                'ios'=>'ios','android'=>'android'
            )
        )
    ),
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
        'name'=>'server_id',
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'text',
            'title'=> '输入新id',
            'url' => '/platform/editable',
        )
    ),
    array(
        'name'=>'server_name',
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
            'title'=> '输入新ip',
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
            'title'=> '输入新密码',
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
        'htmlOptions' => array('nowrap'=>'nowrap'),
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