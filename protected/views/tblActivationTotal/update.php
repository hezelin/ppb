<?php
/* @var $this TblActivationTotalController */
/* @var $model TblActivationTotal */

$this->breadcrumbs=array(
	'Tbl Activation Totals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblActivationTotal', 'url'=>array('index')),
	array('label'=>'Create TblActivationTotal', 'url'=>array('create')),
	array('label'=>'View TblActivationTotal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblActivationTotal', 'url'=>array('admin')),
);
?>

<h1>Update TblActivationTotal <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>