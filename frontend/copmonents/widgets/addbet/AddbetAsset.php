<?php

namespace app\copmonents\widgets\addbet;

use yii\web\AssetBundle;

class AddbetAsset extends AssetBundle
{
    public $sourcePath = '@frontend/copmonents/widgets/addbet/assets';
    public $publishOptions = ['forceCopy' => true,];
//    public $jsOptions = ['position' => \yii\web\View::POS_END];
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';

    public $css = [
         'css/form.css',
         //'libs/gridder-master/gridder-master/dist/css/jquery.gridder.min.css', // гридер
    ];

    public $js = [
         'js/form.js',// обработчик для - поставить ставку в попапу
         'js/stiskycart.js', // обработчик для - корзины
         //'libs/gridder-master/gridder-master/dist/js/jquery.gridder.min.js',// гридер
       // 'libs/gridder-master/initgrider.js',// инит гридер
    ];
    public $depends = [
        // 'frontend\assets\AppAsset',
        //'yii\web\JqueryAsset',
        // 'yii\web\YiiAsset',
        // 'frontend\assets\AppAssetjsendpage',
    ];

//    /**
//     * @inheritdoc
//     */
//    public function init()
//    {
//        $this->setSourcePath(__DIR__ . '/assets');
//        $this->setupAssets('css', ['css/form',]);
//        $this->setupAssets('js', ['js/form',]);
//        parent::init();
//    }

}
