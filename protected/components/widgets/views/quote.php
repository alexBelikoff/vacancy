<div id="quote-of-the-day-conteiner">               
            <p>Цитата дня</p>
            <div id="quote-of-the-day">
    <?php $this->beginContent('webroot.themes.'.Yii::app()->theme->name.'.views.decorators.quote', array('author'=>$quote->author)); ?>
     <?php echo $quote->text; ?> 
    <?php $this->endContent(); ?>                            
            </div>
<?php echo CHtml::ajaxLink('Следующая цитата', Yii::app()->createUrl('quotes/UpdateAjax'), array('update'=>'#quote-of-the-day')); ?>            
        </div>
