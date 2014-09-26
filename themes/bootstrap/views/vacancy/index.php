<?php
/* @var $this VacancyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vacancies',
);

$this->menu=array(
	array('label'=>'Create Vacancy', 'url'=>array('create')),
	array('label'=>'Manage Vacancy', 'url'=>array('admin')),
);
?>

<h1>Vacancies</h1>
<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));?>
