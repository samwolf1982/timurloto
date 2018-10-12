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
    ];
    public $js = [
      //  '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'
        //'js/libs/sticky-js-master/sticky-js-master/dist/sticky.min.js',
      //  'js/libs/sticky-master/sticky-master/jquery.sticky.js',
        'js/libs/custombox-master/custombox-master/dist/custombox.min.js',
        'js/libs/loadModalAjax.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
