<?php

class ESmartyViewRenderer extends CApplicationComponent implements IViewRenderer
{
    public $fileExtension  = '.tpl';
    public $filePermission = 0755;
    
    private $smarty;
    
    function init()
    {
        Yii::import('application.vendors.smarty.*');
        spl_autoload_unregister( array('YiiBase','autoload'));
        require_once ('Smarty.class.php');
        spl_autoload_register( array('YiiBase','autoload'));
        $this->smarty = new Smarty();
        $this->smarty->template_dir = '';
        $compileDir = Yii::app()->getRuntimePath().'/smarty/compiled/';
        
        if(!file_exists( $compileDir )){
            mkdir($compileDir, $this->filePermission, true);
        }
        
        $this->smarty->compile_dir = $compileDir;
        $this->smarty->assign('Yii', Yii::app());
    }
    
    /**
     * Создает файл представления
     * Этот метод необходим для (@link IviewRenderer)
     * @param CBaseController контроллер или виджет,
     * создающий файл представления
     * @param sting путь к файлу представления
     * @param mixed данные, передаваемые представлению
     * @param boolean должен ли возвращаться результат
     * @return mixed возвращаемый результат или null, если не нужен
     */
    
    public function renderFile( $context, $sourceFile, $data, $return ) 
        {
            //свойства текущего контроллера будут доступны как {this.property}
            $data['this']=$context;
            
            if(!is_file( $sourceFile ) || ($file=  realpath( $sourceFile))===false){
                throw new CException(Yii::t('ext','View file "$sourceFile" does not exist.',array('{file}'=>$sourceFile)));
            }
            $this->smarty->assign($data);
            
            if($return){
                return $this->smarty->fetch($sourceFile);
            }else{
                $this->smarty->display($sourceFile);
            }
        }
}