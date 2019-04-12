<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [

        'newsb' => [
            'class' => 'snapget\news\Module',
        ],

        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            'treeViewSettings' => [
    'nodeView' => '@kvtree/views/_form',
    'nodeAddlViews' => [
        \kartik\tree\Module::VIEW_PART_1 => '',
        \kartik\tree\Module::VIEW_PART_2 => '@app/views/kartik/_form',
        \kartik\tree\Module::VIEW_PART_3 => '',
        \kartik\tree\Module::VIEW_PART_4 => '',
        \kartik\tree\Module::VIEW_PART_5 => '',
    ],],

//            'dataStructure'=>[ 'slugAttribute' => 'slug'],

            // other module settings, refer detailed documentation
        ],

    ],
];
