<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ProfileUserAsset extends AssetBundle
{
    public $sourcePath = '@frontend/views/profile';
    public $publishOptions = ['forceCopy' => true,];
//    public $jsOptions = ['position' => \yii\web\View::POS_END];
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';

    public $css = [
        // 'dist/css/style.css',

    ];

    public $js = [
        'dist/js/profileEvents.min.js',//

    ];
    public $depends = [

    ];
}
