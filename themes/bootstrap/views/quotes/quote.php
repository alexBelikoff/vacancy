<?php 
$this->beginContent('webroot.themes.'.Yii::app()->theme->name.'.views.decorators.quote', array('author'=>$quote->author));
echo $quote->text;
$this->endContent(); ?>                


