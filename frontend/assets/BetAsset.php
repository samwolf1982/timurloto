<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BetAsset extends AssetBundle
{
    public $sourcePath = '@frontend/views/bet';
    public $publishOptions = ['forceCopy' => true,];
//    public $jsOptions = ['position' => \yii\web\View::POS_END];
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';

    public $css = [
        // 'dist/css/betasset.css',
        // 'dist/libs/gridder-master/gridder-master/dist/css/jquery.gridder.min.css',
    ];

    public $js = [
       // 'dist/js/formBet.js',// обработчик для - поставить ставку в попапу
        //'dist/libs/gridder-master/gridder-master/dist/js/jquery.gridder.js',// grid
      //  'dist/libs/gridder-master/initgrider.js',// grid
    ];
    public $depends = [
      // 'frontend\assets\AppAsset',
       //'yii\web\JqueryAsset',
       // 'yii\web\YiiAsset',
        // 'frontend\assets\AppAssetjsendpage',
    ];
}
