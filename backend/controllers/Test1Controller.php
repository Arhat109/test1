<?php
namespace backend\controllers;

use common\models\ControllerTrait;
use common\models\DoCalc;
use Exception;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Test1 controller -- base logic for docs/task1.php
 * validating submitting front form and add result into database test.calculator
 */
class Test1Controller extends Controller
{
    use ControllerTrait;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [ 'actions' => ['add'], 'allow' => true ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'add' => ['get','post'],
                ],
            ],
        ];
    }

    /**
     * POST:: add new data (JSON) and run DoCalc model
     * JSON{ iiduser:int, a:string, b:string, c:string }
     *
     * @return string -- JSON {res:float|error:string}
     * @throws Exception
     */
    public function actionAdd()
    {
        $data = new DoCalc( $this->getAllParams() );
        if( $data->validate() ){
            $data->calcSave();   // maybe add $data->error
        }

        // make result array for json return
        if( $data->error ){ $res = $data->jsonGetError();  }
        else              { $res = $data->jsonGetResult(); }

        return $this->asJson($res);
    }
}
