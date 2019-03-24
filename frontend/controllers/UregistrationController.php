<?php
namespace frontend\controllers;




use common\models\overiden\RegistrationForm;
use dektrium\user\Finder;
//use dektrium\user\models\RegistrationForm;
use Yii;
use dektrium\user\controllers\RegistrationController as  OverriddeneRegistrationController;
use dektrium\user\Module;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class UregistrationController  extends OverriddeneRegistrationController
{


//Я ошибся, Yii::$app->getModule('user')->manager - вот так можно обратиться к модулю user.


    /**
     * Displays the registration page.
     * After successful registration if enableConfirmation is enabled shows info message otherwise
     * redirects to home page.
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionRegister()
    {

        //if (!($this->module instanceof \dektrium\user\Module)) {
        if (!(Yii::$app->getModule('user') instanceof \dektrium\user\Module)) {
            throw new NotFoundHttpException();
        }
        $this->module=Yii::$app->getModule('user');

        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());    // нужно еще добавит поле чекбокс todo
        if(YII_ENV!='prod'){
            if(empty($model->username))  $model->username='some_name_' .rand();
            if(empty($model->fullname))  $model->fullname='some fullname ' .rand();
            if(empty($model->email))  $model->email='mail'.rand().'@mail.ru';
            if(empty($model->password))  $model->password=rand(111111,9999999);
        }




        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);
// own validate
//        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
//            \Yii::$app->response->format = Response::FORMAT_JSON;
//            \Yii::$app->response->data   = ActiveForm::validate($model);
//            if(!empty(\Yii::$app->response->data)){
//                \Yii::$app->response->send();
//                \Yii::$app->end();
//            }
//
//        }




        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            Yii::error($event);
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);
//            \Yii::$app->response->format = Response::FORMAT_JSON;
//            return ['success' => 'sssss'];
            Yii::$app->response->redirect(Url::toRoute(['/success']));

        }

        return $this->renderAjax('@app/views/account/overriden/registration/register', [
            'model'  => $model,
            'module' => $this->module,
            ]);
    }


}
