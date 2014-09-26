<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div id="quote-of-the-day-conteiner">               
            <p>Цитата дня</p>
            <div id="quote-of-the-day">
                <?php $this->renderPartial('_quote', array(
                    'quote'=> $quote,
               )); 
                ?>
            </div>
<?php echo CHtml::ajaxLink('Следующая цитата', array('getQuote'), array('update'=>'#quote-of-the-day')); ?>            
        </div> 

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Congratulations! You have successfully created your Yii application.</p>

<?php $this->endWidget(); ?>

<p>You may change the content of this page by modifying the following two files:</p>

<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
