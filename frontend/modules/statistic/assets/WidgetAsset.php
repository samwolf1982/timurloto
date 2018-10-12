<?php
namespace app\modules\statistic\assets;

use yii\web\AssetBundle;

class WidgetAsset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $js = [
        'js/statistics.js',
    ];
    
    public $css = [
       // 'css/styles.css',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/../web';
        parent::init();
    }
    public $publishOptions = [
        'forceCopy' => true,
        ];
}
