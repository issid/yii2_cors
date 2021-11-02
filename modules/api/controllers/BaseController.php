<?php

namespace app\modules\api\controllers;

use app\models\User;
use app\modules\api\traits\CorsFilter;
use yii\rest\Controller;

class BaseController extends Controller
{
    use CorsFilter;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        return self::prepareCorsBehaviors($behaviors);
    }

     /**
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        if (!$result = User::find()->all()) {
            throw new NotFoundHttpException('Не удалось найти User');
        }
        return $result;
    }
}