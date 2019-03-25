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
//        $this->module->viewPath = '@frontend/views/account/overriden/mail';
//        Yii::$app->mailer->viewPath = '@frontend/views/account/overriden/mail';

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



        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
//            Yii::$app->mailer->viewPath="@frontend/views/account/overriden/mail";
//            Yii::error(Yii::$app->mailer->viewPath );
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


    /**
     * Confirms user's account. If confirmation was successful logs the user and shows success message. Otherwise
     * shows error message.
     *
     * @param int    $id
     * @param string $code
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionConfirm($id, $code)
    {

        ///uregistration/register
        $this->module=Yii::$app->getModule('user');
        $user = $this->finder->findUserById($id);

        if ($user === null || $this->module->enableConfirmation == false) {
            throw new NotFoundHttpException();
        }

        $event = $this->getUserEvent($user);

        $this->trigger(self::EVENT_BEFORE_CONFIRM, $event);


   $statusConfirm=     $user->attemptConfirmation($code);

   yii::error(['$statusConfirm'=>$statusConfirm]);



        if($statusConfirm){
            $this->trigger(self::EVENT_AFTER_CONFIRM, $event);
            Yii::$app->response->redirect(Url::toRoute(['/account',['id'=>$id]]));
        }else{

        }

        //exit();
        //Yii::$app->response->redirect(Url::toRoute(['/success-confirm']));
        return $this->render('/message', [
            'title'  => \Yii::t('user', 'Account confirmation'),
            'module' => $this->module,
        ]);
    }

}
