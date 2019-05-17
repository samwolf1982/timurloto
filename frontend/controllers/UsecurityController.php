<?php
namespace frontend\controllers;





use common\models\helpers\ConstantsHelper;
use common\models\overiden\RegistrationForm;
use dektrium\user\Finder;
//use dektrium\user\models\RegistrationForm;
use dektrium\user\models\LoginForm;
use Yii;
use dektrium\user\controllers\SecurityController as  OverriddeneSecurityController;
use dektrium\user\Module;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;


class UsecurityController  extends OverriddeneSecurityController
{


//Я ошибся, Yii::$app->getModule('user')->manager - вот так можно обратиться к модулю user.



    /**
     * Displays the login page.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }


        $this->module=Yii::$app->getModule('user');
        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $this->trigger(self::EVENT_AFTER_LOGIN, $event);
            return $this->redirect(Url::toRoute(['/account','id'=>Yii::$app->user->id]));
            return $this->goBack();
        }


        if(Yii::$app->request->isAjax){
            return $this->renderAjax('@app/views/account/overriden/security/login', [
                'model'  => $model,
                'module' => $this->module,
            ]);
        }else{

            // redirect на главную с отображением формы для входа
            yii::$app->session->addFlash(ConstantsHelper::SHOW_MODAL_AFRER_LOAD_PAGE, ConstantsHelper::SHOW_MODAL_USER_LOGIN_MAIN_FORM, true);


            return $this->redirect(Url::toRoute(['/account','id'=>$model->id]));
             return $this->redirect(Url::to(['/']));
//            return $this->render('login', [
//                'model'  => $model,
//                'module' => $this->module,
//            ]);
        }


    }


    public function authenticate(ClientInterface $client)
    {

        die('sssss');
        $account = $this->finder->findAccount()->byClient($client)->one();

        if (!$this->module->enableRegistration && ($account === null || $account->user === null)) {
            \Yii::$app->session->setFlash('danger', \Yii::t('user', 'Registration on this website is disabled'));
            $this->action->successUrl = Url::to(['/user/security/login']);
            return;
        }

        if ($account === null) {
            /** @var Account $account */
            $accountObj = \Yii::createObject(Account::className());
            $account = $accountObj::create($client);
        }

        $event = $this->getAuthEvent($account, $client);

        $this->trigger(self::EVENT_BEFORE_AUTHENTICATE, $event);

        if ($account->user instanceof User) {
            if ($account->user->isBlocked) {
                \Yii::$app->session->setFlash('danger', \Yii::t('user', 'Your account has been blocked.'));
                $this->action->successUrl = Url::to(['/user/security/login']);
            } else {
                $account->user->updateAttributes(['last_login_at' => time()]);
                \Yii::$app->user->login($account->user, $this->module->rememberFor);
                $this->action->successUrl = \Yii::$app->getUser()->getReturnUrl();
            }
        } else {
            $this->action->successUrl = $account->getConnectUrl();
        }

        $this->trigger(self::EVENT_AFTER_AUTHENTICATE, $event);
    }





}
