<?php
/* @var $this TblActivationTotalController */
/* @var $model TblActivationTotal */

$this->breadcrumbs=array(
	'Tbl Activation Totals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblActivationTotal', 'url'=>array('index')),
	array('label'=>'Manage TblActivationTotal', 'url'=>array('admin')),
);
?>

<h1>Create TblActivationTotal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>