<?php
namespace frontend\controllers;




use common\models\overiden\RegistrationForm;
use common\models\overiden\User;
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
     * Displays page where user can create new account that will be connected to social account.
     *
     * @param string $code
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionConnect($code)
    {

        $account = $this->finder->findAccount()->byCode($code)->one();

        if ($account === null || $account->getIsConnected()) {
            throw new NotFoundHttpException();
        }

        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'connect',
            'username' => $account->username,
            'email'    => $account->email,
        ]);

        $event = $this->getConnectEvent($account, $user);

        $this->trigger(self::EVENT_BEFORE_CONNECT, $event);

        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            $account->connect($user);
            $this->trigger(self::EVENT_AFTER_CONNECT, $event);
            \Yii::$app->user->login($user, $this->module->rememberFor);
            return $this->goBack();
        }

        return $this->render('connect', [
            'model'   => $user,
            'account' => $account,
        ]);
    }



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
            if(empty($model->password)) $model->password=111111;//  $model->password=rand(111111,9999999);
        }




        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REGISTER, $event);

        $this->performAjaxValidation($model);



        if ($model->load(\Yii::$app->request->post()) && $model->register()) {
            $this->trigger(self::EVENT_AFTER_REGISTER, $event);
            if(!empty($model->newusero->id)){ // login go to account
                Yii::$app->user->login($model->newusero);
                Yii::$app->response->redirect(Url::toRoute(['/account','id'=>$model->newusero->id]));
            }else{
                Yii::$app->response->redirect(Url::toRoute(['/success']));
            }



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
