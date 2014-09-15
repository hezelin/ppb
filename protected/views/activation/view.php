<?php
$gridColumns = array(
    'id',
    'code',
    array(
        'name'=>'status',
        'filter'=>array(
            'no'=>'未使用','yes'=>'已使用'
        ),
        'class' => 'booster.widgets.TbEditableColumn',
        'headerHtmlOptions' => array('style' => 'width:200px'),
        'editable' => array(
            'type' => 'select',
            'title'=> '更改状态',
            'url' => '/activation/status',
            'source'=> array(
                'yes'=>'已使用','no'=>'未使用'
            )
        )
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