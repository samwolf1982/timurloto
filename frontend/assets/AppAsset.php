<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
//    public $sourcePath='@webroot/source';
    public $css = [
        'css/look-icon-fonts/style.css',
        'css/main.min.css',
        'css/globalfix.css',
        'js/libs/custombox-master/custombox-master/dist/custombox.min.css',
        'css/somefile.css'
    ];
    public $js = [

        'js/libs/custombox-master/custombox-master/dist/custombox.min.js',
        'js/libs/loadModalAjax.js',
        '//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js',
        'js/some.js',
        ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
