<?php

class ChartController extends Controller
{
    public function actionIndex()
    {
        $value=rand(10,90);
        $this->render('index', array(
            'chart'=>$this->widget('ext.chart.EChartWidget', array(
            'title'=>'Do you like?',
            'data'=>array(
                $value, 100-$value,
            ),
            'labels'=>array(
                'No','Yes',
            ),
        ))
        ));

    }
}
