<?php
/* @var $this VacancyController */
/* @var $model Vacancy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacancy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row form-group">
		<?php echo $form->labelEx($model,'vacancy_name'); ?>
		<?php echo $form->textField($model,'vacancy_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'vacancy_name'); ?>
	</div>

	<div class="row form-group">
		<?php echo $form->labelEx($model,'vacancy_description'); ?>
		<?php echo $form->textArea($model,'vacancy_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'vacancy_description'); ?>
	</div>

	<div class="row form-group">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php echo $form->textField($model,'department_id'); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->