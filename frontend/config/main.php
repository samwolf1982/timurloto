<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);


return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',
        'dvizh\cart\Bootstrap'
        ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],

//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
//        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'account/'=>'account/index'
            ],
        ],

        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                // here is the list of clients you want to use
                // you can read more in the "Available clients" section
//                'github' => [
//                    'class'        => 'dektrium\user\clients\GitHub',
//                    'clientId'     => '2035d003b9cdf93aeeca',
//                    'clientSecret' => '7e5b6ab5b8eeab5261b7edde23cbe3b0a4be276b',
//                ],

                'github' => [
                    'class'        => 'dektrium\user\clients\GitHub',
                    'clientId'     => ISLOCAL ? '2035d003b9cdf93aeeca' :  '25151b54c968b94152f0',
                    'clientSecret' => ISLOCAL ? '7e5b6ab5b8eeab5261b7edde23cbe3b0a4be276b' :  'b1420391d72fd5d50f38a5611c8c72729a4b3426',
                ],

//                'github' => [
//                    'class'        => 'dektrium\user\clients\GitHub',
//                    'clientId'     => ISLOCAL ? '2035d003b9cdf93aeeca' :  '3d5c6c9d7aefac8e63a4',
//                    'clientSecret' => ISLOCAL ? '7e5b6ab5b8eeab5261b7edde23cbe3b0a4be276b' :  '6ce246227883fd55b212cf76ab94b809eec178a7',
//                ],

                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => 'APP_ID',
                    'clientSecret' => 'APP_SECRET',
                ],
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => '1011370333812-pb8qcuc01ves6bavav1hciafk6g60cnk.apps.googleusercontent.com',
                    'clientSecret' => 'Lsx7FJfrnPeKqBDltaALWBSS',
//                    'returnUrl' => 'https://bet.domashka.in.ua/user/auth?authclient=google',
                    'returnUrl' => 'https://bet.domashka.in.ua/user/security/auth?authclient=google',
                ],

                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
//                'yandex' => [
//                    'class'        => 'dektrium\user\clients\Yandex',
//                    'clientId'     => 'CLIENT_ID',
//                    'clientSecret' => 'CLIENT_SECRET'
//                ],

            ],
        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
            'defaultRoles' => ['simpleuser'], // your define roles
        ],



        'balance' => [
            'class' => 'komer45\balance\Balance'
        ],

        'cart' => [
            'class' => 'dvizh\cart\Cart',
            'currency' => 'р.', //Валюта
            'currencyPosition' => 'after', //after или before (позиция значка валюты относительно цены)
            'priceFormat' => [2,'.', ''], //Форма цены
        ],


    ],


    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'registration' => [
                    'class' => \dektrium\user\controllers\RegistrationController::className(),
                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_REGISTER => function ($e) {
//    yii::error(['go gfo']);
//    die();

                        $auth = Yii::$app->authManager;
                        $role = $auth->getRole('simpeuser');
                        // dont work for social
                        $auth->assign($role, $e->id);
                        $findUser = Score::find()->where(['user_id' => $e->id])->one();
                        if (!$findUser){
                            $userBalance = new Score;
                            $userBalance->user_id = $e->id;
                            $userBalance->balance = 100000;

                            if($userBalance->validate()){
                                return $userBalance->save();
                            } else die('Uh-oh, somethings went wrong!');
                        }
                        // add balance
//                        Yii::$app->balance->increase($e->id, 500);
//                      //  Yii::$app->response->redirect(array('/user/security/login'))->send();
//                        Yii::$app->response->redirect(array('/bet'))->send();
//                        Yii::$app->end();


                    },

                ],
            ],
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        'balance' => [
            'class' => 'komer45\balance\Module',
            'adminRoles' => ['admin'],
            'otherRoles' => ['simpleuser'],
            'currencyName' => 'баллов'
        ],
        'cart' => [
            'class' => 'dvizh\cart\Module',
        ],
        // cтатистка информационные виджеты
        'statistic' => [
            'class' => 'app\modules\statistic\Module',
        ],
        // механизм  управления ставками   like GRUD .
        'wager' => [
            'class' => 'app\modules\wager\Module',
//            'clear_cart'=>true,
        ],

    ],

    'params' => $params,
];
