<?php

if(YII_ENV=='prod'){
    //throw  new  ErrorException('no users fields ');
}else{
    //throw  new  ErrorException('no users fields ');
}



$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);


return [
    'id' => 'app-frontend',
    'name' => 'LOOK MY BET',
    'language' => 'ru',
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
           // 'name' => 'advanced-frontend',
            'name' => 'advanced_frontend',
         //   'class' => 'yii\web\DbSession',
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
            'errorAction' => YII_ENV!='prod'? 'site/error':'/error-page',
           // 'errorAction' => '/error-page',
          //  'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // роутинг для новостей по слагу категория категория ... новость
                ['class'=>'app\copmonents\routing\ExtNewsCatUrlRule'],
                ['class'=>'app\copmonents\routing\ExtNewsPageUrlRule'],

//                'news/default/index'=>'news/index',
                'account/'=>'account/index',
                'settings/'=>'user/settings',
                'account/<id:\d+>' => 'account/view',

//                '/'=>'dashboard/index', // убрать  на фронте


                '/matches'=>'/dashboard/index', // для разработки
//                '/matches'=>'/matches/index',

              //  'site/index' =>   'dashboard',

            // корзина
                '/cart/default/info' => '/cart/default/info',
                '/cart/element/create' => '/cart/element/create',



                // chart
              //  'account/chart/<id:\d+>' => 'account/chart',
                'account/chart' => 'account/chart',
                // авторизация нужно для совм с модулями
                'user/security/auth'=>'user/security/auth',
                'user/registration/connect'=>'user/registration/connect',


                //корзина ставка  плейлисты
                'wager/default/add'=>'wager/default/add',
                'cart/element/update-status'=>'cart/element/update-status',
                'cart/element/update-single'=>'cart/element/update-single',
                'cart/element/update-playlist'=>'cart/element/update-playlist',
                'statistic/default/add'=>'statistic/default/add',

                // подвтерждение ставки из confirm
                'wager/default/konfirmi'=>'wager/default/konfirmi',

                // переписки запросы
                'account/default/chart'=>'account/default/chart',
                'subscribers/default/add-message'=>'subscribers/default/add-message',
                'subscribers/default/send-message'=>'subscribers/default/send-message',
                'account/addsubscriber'=>'account/addsubscriber',
//                'news/index'=>'news/index',

                // доступы

               'account/open-access'=>'account/open-access',



                // cтавки  http://localhost35/bet/index
                'bet/index'=>'bet',
                '/bet/nextload'=>'/bet/nextload',

                // регистрации
                '/user/registration/register'=>'/user/registration/register',
                '/uregistration/index'=>'/uregistration/index',
                '/uregistration/register'=>'/uregistration/register',


                '/uregistration/confirm/<id:(.*?)>/<code:(.*?)>'=>'/uregistration/confirm',

                '/usecurity/login'=>'/usecurity/login',
                '/urecovery/request'=>'/urecovery/request',
                '/urecovery/reset/<id:(.*?)>/<code:(.*?)>'=>'/urecovery/reset',


                // первая регистрация через соцсеть

               // '/uregistration/connect/<code:(.*?)>'=>'/user/registration/connect',
//                '/user/registration/connect/code:(.*?)>'=>'uregistration/connect',



                // delete
                '/user/security/login'=>'/user/security/login',
                '/user/recovery/request'=>'/user/recovery/request',


                // новости
//                '/news/view?<id:(.*?)>'=>'/news/view/<id>',
                '/news/view?<id:(.*?)>'=>'/news/view/<id>',
                '/news/index?<id:(.*?)>'=>'/news/index/<id>',



                // модули удалить default мешают для аутентификации через соцсети
                '<module:\w+>/<action:\w+>/<id:(.*?)>' => '<module>/default/<action>/<id>',
                '<module:\w+>/<action:\w+>/<id:(.*?)>' => '<module>/<action>/<id>',
                '<module:\w+>/<action:\w+>/<tourneyId:(.*?)>' => '<module>/default/<action>/<tourneyId>',
                '<module:\w+>/<action:\w+>' => '<module>/default/<action>',
//                '<module:\w+>/<action:\w+>' => '<module>/<action>',
                //'<module:\w+>/<action:\w+>/<id:(.*?)>' => '<module>/default/<action>/<id>',
                ],
        ],

        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                // here is the list of clients you want to use
//                'github' => [
//                    'class'        => 'dektrium\user\clients\GitHub',
//                    'clientId'     => ISLOCAL ? '2035d003b9cdf93aeeca' :  '3d5c6c9d7aefac8e63a4',
//                    'clientSecret' => ISLOCAL ? '7e5b6ab5b8eeab5261b7edde23cbe3b0a4be276b' :  '6ce246227883fd55b212cf76ab94b809eec178a7',
//                ],

                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                   // 'clientId'     => '1056597404526732',
                    'clientId'     => '2163911647024298',
                    //'clientSecret' => 'ea6c1f9eef5d161fc45dd79b8fec439f',
                    'clientSecret' => 'da9ba944ebaec21ca07f46fd56fc8cac',
                ],

                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                  //own //  'clientId'     => '1011370333812-pb8qcuc01ves6bavav1hciafk6g60cnk.apps.googleusercontent.com',
                    'clientId'     => '602134147548-udkk32mg3v5rvjgtnbla1a1e0u9gve37.apps.googleusercontent.com',
                 //own //    'clientSecret' => 'Lsx7FJfrnPeKqBDltaALWBSS',
                    'clientSecret' => 'zEb1M5ojCOmR2D8sF5CGHvZX',
//                    'returnUrl' => 'https://bet.domashka.in.ua/user/auth?authclient=google',
                  // own//  'returnUrl' => 'https://bet.domashka.in.ua/user/security/auth?authclient=google',

                    'returnUrl' => 'https://lookmybets.com/user/security/auth?authclient=google',
                ],

                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => '6940986',
                    'clientSecret' => 'PsvKyfIOYGZm1w6zx2dl',
                ],


            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/account/overriden',

                ],
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
                'settings' => '\frontend\controllers\overriden\SettingsController',
                'uregistration' => '\frontend\controllers\UregistrationController',
                'usecurity' => '\frontend\controllers\UsecurityController',
                'urecovery' => '\frontend\controllers\UrecoveryController',
            ],
            'modelMap' => [
                'User' => 'common\models\overiden\User',
            ],



            'mailer' => [
                'viewPath' => '@frontend//views/account/overriden/mail',
            ],



            //            'components' => [
//                'mailer' => [
//                    'class' => 'app\components\Mailer'
//                    // 'viewPath' => '@app/views/account/overriden/mail',
//                ]
//            ],
//            'mailer' => [
//                'viewPath' => '@frontend/views/account/overriden/mail',
//            ],


//            'enableUnconfirmedLogin' => true,
//            'confirmWithin' => 21600,
//            'cost' => 12,
//            'admins' => ['admin'],

//            'controllerMap' => [
//                'registration' => [
//                    'class' => \dektrium\user\controllers\RegistrationController::className(),
//                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_REGISTER => function ($e) {
////    yii::error(['go gfo']);
////    die();
//
////                        $auth = Yii::$app->authManager;
////                        $role = $auth->getRole('simpeuser');
////                        // dont work for social
////                        $auth->assign($role, $e->id);
////                        $findUser = Score::find()->where(['user_id' => $e->id])->one();
////                        if (!$findUser){
////                            $userBalance = new Score;
////                            $userBalance->user_id = $e->id;
////                            $userBalance->balance = 100000;
////
////                            if($userBalance->validate()){
////                                return $userBalance->save();
////                            } else die('Uh-oh, somethings went wrong!');
////                        }
////
//
//                        // add balance
////                        Yii::$app->balance->increase($e->id, 500);
////                      //  Yii::$app->response->redirect(array('/user/security/login'))->send();
////                        Yii::$app->response->redirect(array('/bet'))->send();
////                        Yii::$app->end();
//
//
//                    },
//
//                ],
//            ],

            'enableUnconfirmedLogin' => true,    // можно не подтвержденнным
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],

        'new2' => [
            // following line will restrict access to `admin-news-category` and `admin-news` controllers from frontend application
            'as frontend' => 'snapget\news\filters\FrontendFilter',

//            'baseImageUrl' => 'http://news/upload/news',    // needs here absolute url
            'baseImageUrl' => YII_ENV!='prod'?   'http://localhost35/upload/news/':   'https://lookmybets.com/upload/news/',    // needs here absolute url
        ],

//        'news' => [
//            'class' => 'eugenekei\news\Module',
//            'controllerNamespace' => 'eugenekei\news\controllers\frontend',
//        ],

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

        // подписчики
        'subscribers' => [
            'class' => 'frontend\modules\subscribers\SubscriberModule',
        ],

        // купленный парсер
        'provider' => [
            'class' => 'app\modules\parsernode\Module',

        ],

    ],

    'params' => $params,
];
