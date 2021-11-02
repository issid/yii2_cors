<?php

namespace app\modules\api\traits;

use yii\filters\Cors;

/**
 * Установка CORS для апи
 */
trait CorsFilter
{
    /**
     * @param $behaviors
     * @return mixed
     */
    public static function prepareCorsBehaviors($behaviors)
    {
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Origin' => explode(',', getenv('ALLOWED_ORIGIN')) ?? [],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Allow-Credentials' => getenv('ALLOWED_CREDENTIALS') ?? false,
                'Access-Control-Allow-Headers' => ['*'],
            ],
        ];

        $behaviors['authenticator'] = $auth;
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

    /**
     * @return array
     */
    public function actionOptions()
    {
        $response = \Yii::$app->getResponse();
        $response->setStatusCode(204);
        return [];
    }
}