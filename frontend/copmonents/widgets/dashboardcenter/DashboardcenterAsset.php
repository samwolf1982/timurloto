<?php

namespace app\copmonents\widgets\dashboardcenter;

use yii\web\AssetBundle;

class DashboardcenterAsset extends AssetBundle
{
    public $sourcePath = '@frontend/copmonents/widgets/dashboardcenter/assets';
    public $publishOptions = ['forceCopy' => true,];
    public $css = [

    ];

    public $js = [
            'js/dashboardcenter_bet.min.js'
//            'js/dashboardcenter_bet.js'
        ];
    public $depends = [
        // 'frontend\assets\AppAsset',
        //'yii\web\JqueryAsset',
        // 'yii\web\YiiAsset',
        // 'frontend\assets\AppAssetjsendpage',
    ];



}
