<?php
/* @var $this VacancyController */
/* @var $model Vacancy */

$this->breadcrumbs=array(
	'Vacancies'=>array('index'),
	$model->vacancy_id=>array('view','id'=>$model->vacancy_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vacancy', 'url'=>array('index')),
	array('label'=>'Create Vacancy', 'url'=>array('create')),
	array('label'=>'View Vacancy', 'url'=>array('view', 'id'=>$model->vacancy_id)),
	array('label'=>'Manage Vacancy', 'url'=>array('admin')),
);
?>

<h1>Update Vacancy <?php echo $model->vacancy_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
