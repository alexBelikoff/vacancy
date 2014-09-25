<?php
/* @var $this VacancyController */
/* @var $model Vacancy */

$this->breadcrumbs=array(
	'Vacancies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vacancy', 'url'=>array('index')),
	array('label'=>'Create Vacancy', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vacancy-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Vacancies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php //var_dump(Department::items); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vacancy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'pager'=> array(        
            'class' => 'LinkPager', 
        ),      
	'columns'=>array(
                array(
                    'name'=>'vacancy_name',
                    'type'=>'raw',
                    'value'=>'CHtml::link(CHtml::encode($data->vacancy_name), $data->url)',
                ),
		array('name'=>'vacancy_description'),
                array(
                        'name'=>'department_id',
                        'header'=>'Department',
                        'value'=>'Department::getDepartmentName($data->department_id)',
                        'filter'=>Department::getDepartmens(),
                    ),
                /*array(
                        'header'=>'Translate',
                        'value'=>'Vacancy::getVacancyLanguge($data->vacancy_id)',
                        //'filter'=>Vacancy::getVacancyLangugeAll(),
                ),*/
		array(
			'class'=>'CButtonColumn',
		),
	),
));



?>
