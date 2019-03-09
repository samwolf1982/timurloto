<?php

namespace frontend\modules\subscribers\controllers;

use common\models\services\UserInfo;
use common\models\Wager;
use Yii;
use yii\web\Controller;
use yii\web\Response;

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


    /**
     * пользователь
     * кнокпка узнать прогноз
     * @id пользователь
     * @return string
     */
    public function actionPeto($id)
    {


        // все переделать под
        $model=Wager::find()->where(['id'=>$id])->one();

        $userInfo= new UserInfo($id);
//        $type_play
//        yii::error($model);

            return $this->renderPartial('peto',['model'=>$model,'userInfo'=>$userInfo]);

    }


    /**
     *
     * @return array
     */
    public function actionAddMessage()
    {
        // todo нужно доделать
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['status'=>"ok"];
        return ['status'=>"error"]; //
    }

    /**
     *
     * @return array
     */
    public function actionSendMessage($id)
    {
        // все переделать под
        $model=null;
        $userInfo= new UserInfo($id);
//        $type_play
//        yii::error($model);

        return $this->renderPartial('sminfo',['model'=>$model,'userInfo'=>$userInfo]);
    }




    public function actionAdd()
    {
        return $this->render('index');
    }

    public function beforeAction($action)
    {

        if ($action->id === 'add-message') {

            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }




}
