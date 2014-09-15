<?php
/* @var $this TblActivationTotalController */
/* @var $model TblActivationTotal */

$this->breadcrumbs=array(
	'Tbl Activation Totals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblActivationTotal', 'url'=>array('index')),
	array('label'=>'Create TblActivationTotal', 'url'=>array('create')),
	array('label'=>'Update TblActivationTotal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblActivationTotal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblActivationTotal', 'url'=>array('admin')),
);
?>

<h1>View TblActivationTotal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'total',
		'create_time',
	),
)); ?>
