<?php
Yii::import('system.web.widgets.pagers.CLinkPager');
 
class LinkPager extends CLinkPager
{
    public $header = '';
    public $prevPageLabel = '&laquo; назад';
    public $nextPageLabel = 'далее &raquo;';
    public $htmlOptions = array(
        'class'=>'pager'
    );
 
    public function __construct($owner=null)
    {        
        $this->cssFile = Yii::app()->baseUrl . '/css/pager.css';
        parent::__construct($owner);
    }
}

