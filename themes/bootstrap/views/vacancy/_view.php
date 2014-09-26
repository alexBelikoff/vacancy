<?php
/* @var $this VacancyController */
/* @var $data Vacancy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vacancy_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vacancy_id), array('view', 'id'=>$data->vacancy_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vacancy_name')); ?>:</b>
	<?php echo CHtml::encode($data->vacancy_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vacancy_description')); ?>:</b>
	<?php echo CHtml::encode($data->vacancy_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department.department_name')); ?>:</b>
	<?php echo CHtml::encode($data->department['department_name']); ?>
	<br />


</div>
<?php 
//var_dump( Department::getDepartmentName('1'));
?>