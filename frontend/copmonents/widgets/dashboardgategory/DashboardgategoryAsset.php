<?php

namespace app\copmonents\widgets\dashboardgategory;

use yii\web\AssetBundle;

class DashboardgategoryAsset extends AssetBundle
{
    public $sourcePath = '@frontend/copmonents/widgets/dashboardgategory/assets';
    public $publishOptions = ['forceCopy' => true,];
    public $css = [

    ];

    public $js = [
            'js/dashboardgategory_bet.min.js'
        ];
    public $depends = [
        // 'frontend\assets\AppAsset',
        //'yii\web\JqueryAsset',
        // 'yii\web\YiiAsset',
        // 'frontend\assets\AppAssetjsendpage',
    ];



}
