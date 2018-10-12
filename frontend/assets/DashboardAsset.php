<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DashboardAsset extends AssetBundle
{

    public $sourcePath = '@frontend/views/dashboard';
    public $publishOptions = ['forceCopy' => true,];
//    public $jsOptions = ['position' => \yii\web\View::POS_END];
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';

    public $css = [
        // 'dist/css/style.css',
//        'dist/css/main.min.css'

    ];
    public $js = [
        'dist/js/script.min.js',
        'dist/js/bet.js',

    ];

    public $depends = [
      // 'frontend\assets\AppAsset',
       //'yii\web\JqueryAsset',
       // 'yii\web\YiiAsset',
        // 'frontend\assets\AppAssetjsendpage',
    ];
}
