<?php
/* @var $this TblActivationTotalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Activation Totals',
);

$this->menu=array(
	array('label'=>'Create TblActivationTotal', 'url'=>array('create')),
	array('label'=>'Manage TblActivationTotal', 'url'=>array('admin')),
);
?>

<h1>Tbl Activation Totals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
