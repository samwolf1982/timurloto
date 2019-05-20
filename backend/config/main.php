<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);




return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//        ],

        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/views/yiister/yii2-gentelella/views'
                ],
            ],
        ],
//        'authManager' => [
//            'class' => 'yii\rbac\DbManager',
//        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        'balance' => [
            'class' => 'komer45\balance\Balance'
        ],

    ],

    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
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
        'rbac' => 'dektrium\rbac\RbacWebModule',

        'newsb' => [
            // following line will restrict access to `news` controller from frontend application
//            'class' => 'snapget\news\Module',
            'as backend' => 'snapget\news\filters\BackendFilter',
            'baseImageUrl' => YII_ENV!='prod'?   'http://localhost35/upload/news/':   'https://lookmybets.com/upload/news/',    // needs here absolute url
        ],
//        'news' => [
//            'class' => 'eugenekei\news\Module',
//            'controllerNamespace' => 'eugenekei\news\controllers\backend',
//            'imageGetUrl' =>    YII_ENV!='prod'?   'http://localhost35/images/news/':   'https://lookmybets.com/images/news/',
//        ],
    ],

    'params' => $params,
];
