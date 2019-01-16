<?php

namespace console\modules\favoritparser;

/**
 * favoritparser module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'console\modules\favoritparser\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function test()
    {
        return $this->rand();
    }


}
