<?php
namespace common\models;

use Yii;

/**
 * Common controller simple methods
 */
trait ControllerTrait
{
    public function getAllParams():array
    {
//die(print_r(Yii::$app->request->get(), true));
        if( Yii::$app->request->isPost ){ return Yii::$app->request->post(); }
        if( Yii::$app->request->isGet  ){ return Yii::$app->request->get();  }
        throw new \Exception("ERROR: GET,POST is available ONLY!");
    }
}
