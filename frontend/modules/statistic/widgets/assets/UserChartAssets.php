<?php

namespace frontend\modules\statistic\widgets\assets;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class UserChartAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/main/main.css',
    ];
    public $js = [
        '//code.highcharts.com/highcharts.js',
        'js/libs/charts/chart.min.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset',

    ];
}
