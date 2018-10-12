<?php

namespace app\copmonents\widgets\dashboardcart;

use yii\web\AssetBundle;

class DashboardcartAsset extends AssetBundle
{
    public $sourcePath = '@frontend/copmonents/widgets/dashboardcart/assets';
    public $publishOptions = ['forceCopy' => true,];
    public $css = [

    ];

    public $js = [
            'js/dashboardcart_bet.min.js'
        ];
    public $depends = [
        // 'frontend\assets\AppAsset',
        //'yii\web\JqueryAsset',
        // 'yii\web\YiiAsset',
        // 'frontend\assets\AppAssetjsendpage',
    ];



}
