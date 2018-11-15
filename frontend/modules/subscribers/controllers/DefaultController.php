<?php

namespace frontend\modules\subscribers\controllers;

use yii\web\Controller;

/**
 * Default controller for the `subscribers` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }



    public function actionAdd()
    {
        return $this->render('index');
    }





}
