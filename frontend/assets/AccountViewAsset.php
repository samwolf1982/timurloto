<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AccountViewAsset extends AssetBundle
{
    public $sourcePath = '@frontend/views/account';
    public $publishOptions = ['forceCopy' => true,];
//    public $jsOptions = ['position' => \yii\web\View::POS_END];
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';

    public $css = [
        // 'dist/css/style.css',
        // 'dist/libs/gridder-master/gridder-master/dist/css/jquery.gridder.min.css',
    ];

    public $js = [
        'dist/js/subsribe.min.js',// открыть доступ закрыть
    ];
    public $depends = [
      // 'frontend\assets\AppAsset',
       //'yii\web\JqueryAsset',
       // 'yii\web\YiiAsset',
        // 'frontend\assets\AppAssetjsendpage',
    ];
}
