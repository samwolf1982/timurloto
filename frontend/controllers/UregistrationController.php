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
use yii\web\NotFoundHttpException;


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
//        $this->layout = '/_register.php';
//        return parent::actionRegister();
//        if (!$this->module->enableRegistration) {
//        if (!Yii::$app->getModule('user')->manager->enableRegistration) {
//            throw new NotFoundHttpException();
//        }



        /** @var RegistrationForm $model */
        $model = \Yii::createObject(RegistrationForm::className());

        $event = $this->getFormEvent($model);


        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);



        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
//            Yii::error($event);
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);
            return $this->render('/message', [
                'title'  => \Yii::t('user', 'Your account has been created'),
                'module' => $this->module,
            ]);
        }

        return $this->renderAjax('@app/views/account/overriden/registration/register', [
            'model'  => $model,
            'module' => $this->module,
            ]);
    }


}
