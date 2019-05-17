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
//    "//cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.6/css/highcharts.css",
    //     'js/libs/charts/highcharts.css',
//    "//code.highcharts.com/css/themes/dark-unica.css",
  // "js/libs/charts/dark-unica.css",
    ];
    public $js = [
//        '//code.highcharts.com/highcharts.js',

//        '//cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.6/js/highstock.js',
//    'js/libs/charts/highstock.min.js',
    '//www.amcharts.com/lib/4/core.js"',
'//www.amcharts.com/lib/4/charts.js"',
'//www.amcharts.com/lib/4/themes/dataviz.js"',
'//www.amcharts.com/lib/4/themes/material.js',
'//www.amcharts.com/lib/4/themes/animated.js"',
      //  'js/libs/charts/chart.min.js'
        'js/libs/charts/chart2.min.js',

       // 'js/libs/charts/ru.min.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset',

    ];
}
