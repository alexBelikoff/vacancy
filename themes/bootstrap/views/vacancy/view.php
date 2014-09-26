<?php
/* @var $this VacancyController */
/* @var $model Vacancy */

$this->breadcrumbs=array(
	'Vacancies'=>array('index'),
	$model->vacancy_name,
);

$this->menu=array(
	array('label'=>'List Vacancy', 'url'=>array('index')),
	array('label'=>'Create Vacancy', 'url'=>array('create')),
	array('label'=>'Update Vacancy', 'url'=>array('update', 'id'=>$model->vacancy_id)),
	array('label'=>'Delete Vacancy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vacancy_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vacancy', 'url'=>array('admin')),
);
?>

<h1>View Vacancy #<?php echo $model->vacancy_name; ?></h1>
<?php if(Yii::app()->user->hasFlash('url')): ?>
<div style="border: 1px solid black;">
    <p>Вы пришли с <?php echo Yii::app()->user->getFlash('url')?></p>
</div>
<?php endif; ?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vacancy_id',
		'vacancy_name',
		'department_id',            
		'vacancy_description',

	),
)); ?>
