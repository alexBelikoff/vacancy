<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" rel="shortcut icon">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
                                array('label'=>'Вакансии','url'=>array('/vacancy/index')),
                                array('label'=>'Пользователи','url'=>array('/user/index'),'visible'=>Yii::app()->user->checkAccess('administrator')),
                                array('label'=>'Цитаты','url'=>array('/quotes/index'),'visible'=>Yii::app()->user->checkAccess('administrator')),
				array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Контакты', 'url'=>array('/site/contact')),
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
<?php $this->widget('application.components.widgets.QuotesWidget'); ?>
	<?php echo $content; ?>

	<div class="clear"></div>

        <footer id="footer">
		Copyright &copy; <?php echo date('Y'); ?><br/>
                <?php echo Yii::app()->params['author']; ?><br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</footer><!-- footer -->

</div><!-- page -->

</body>
</html>
