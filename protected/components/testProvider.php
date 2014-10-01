<?php
class testProvider extends CWidget{
    public static function actions(){
        return array(
                   // naming the action and pointing to the location
                   // where the external action class is
           'GetData'=>'application.components.actions.getData',
        );
    }
}
