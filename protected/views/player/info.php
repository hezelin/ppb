<h3>玩家信息查询</h3>
<?php

$this->widget('booster.widgets.TbGridView', array(
    'type' => 'striped',
    'dataProvider'=>$model->search(),
    'template' => "{summary}\n{items}\n{pager}",
    'filter'=>$model,
    'columns'=>array(
        'role_id',
        'role_name',
        'account_name',
        'agent_id',
        'server_id',
        array(
            'name'=>'reg_date',
            'value'=>'date("Y-m-d H:i",$data->reg_date)',
        ),
        array(
            'name'=>'last_login_time',
            'value'=>'date("Y-m-d H:i",$data->last_login_time)',
        ),
        array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'header'=>'操作',
            'class'=>'booster.widgets.TbButtonColumn',
            'template'=>'{view}',
//            'viewButtonUrl'=>'Yii::app()->createUrl("activation/view",array("code_id"=>$data->id))',
        )
    )
));