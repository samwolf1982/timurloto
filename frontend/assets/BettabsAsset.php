<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BettabsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $publishOptions = ['forceCopy' => true,];
    public $css = [
        'css/fixMatches.css'
    ];
    public $js = [
        'js/bet.min.js',
    ];
    public $depends = ['frontend\assets\AppAsset',];

}
