<?php

class QuotesWidget extends CWidget
{
    private $_issetId=[];
    
    private function getRandomeQuote(){
        if ( empty( $this->_issetId ) ) {
            $this->getIssetId();
        }
        //var_dump($this->_issetId); exit();
        $id    = array_rand( $this->_issetId );
        $quote = Quotes::model()->findByPk( $id );
        return $quote;
    }
    
    private function getIssetId(){
        $criteria         = new CDbCriteria;
        $criteria->select = 'id';
        $quotesId         = Quotes::model()->findAll( $criteria);
        foreach ($quotesId as $id){
            $this->_issetId[$id->id]=$id->id;
        }

    }
            
    
    public function run(){
        $quote = $this->getRandomeQuote();
        $this->render( 'Quote', array(
            'quote' => $quote,
        ) );

    }
    
    public function updateAjax(){
        $quote = $this->getRandomeQuote();
        return $quote;    
    }

}
