<?php
namespace frontend\controllers;





use common\models\overiden\RegistrationForm;
use dektrium\user\Finder;
//use dektrium\user\models\RegistrationForm;
use dektrium\user\models\LoginForm;
use dektrium\user\models\RecoveryForm;
use dektrium\user\models\Token;
use Yii;
use dektrium\user\controllers\RecoveryController as  OverriddeneUrecoveryController;
use dektrium\user\Module;
use yii\base\DynamicModel;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;


class UrecoveryController  extends OverriddeneUrecoveryController
{


//Я ошибся, Yii::$app->getModule('user')->manager - вот так можно обратиться к модулю user.


    /**
     * Shows page where user can request password recovery.
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionRequest()
    {
        $this->module=Yii::$app->getModule('user');
        if (!$this->module->enablePasswordRecovery) {
            throw new NotFoundHttpException();
        }
        /** @var RecoveryForm $model */
        $model = \Yii::createObject([
            'class'    => RecoveryForm::className(),
            'scenario' => RecoveryForm::SCENARIO_REQUEST,
        ]);
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_REQUEST, $event);
        if ($model->load(\Yii::$app->request->post()) && $model->sendRecoveryMessage()) {
            $this->trigger(self::EVENT_AFTER_REQUEST, $event);
            Yii::$app->response->redirect(Url::toRoute(['/success-recovery']));
            return $this->render('/message', [
                'title'  => \Yii::t('user', 'Recovery message sent'),
                'module' => $this->module,
            ]);
        }
        return $this->renderAjax('@app/views/account/overriden/recovery/request', [
            'model'  => $model,
            'module' => $this->module,
        ]);
        return $this->render('request', [
            'model' => $model,
        ]);
    }




    /**
     * Displays page where user can reset password.
     *
     * @param int    $id
     * @param string $code
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionReset($id, $code)
    {
        $this->module=Yii::$app->getModule('user');
        if (!$this->module->enablePasswordRecovery) {
            throw new NotFoundHttpException();
        }

        /** @var Token $token */
        $token = $this->finder->findToken(['user_id' => $id, 'code' => $code, 'type' => Token::TYPE_RECOVERY])->one();
        if (empty($token) || ! $token instanceof Token) {
            throw new NotFoundHttpException();
        }
        $event = $this->getResetPasswordEvent($token);

        $this->trigger(self::EVENT_BEFORE_TOKEN_VALIDATE, $event);

        if ($token === null || $token->isExpired || $token->user === null) {
            $this->trigger(self::EVENT_AFTER_TOKEN_VALIDATE, $event);
            \Yii::$app->session->setFlash(
                'danger',
                \Yii::t('user', 'Recovery link is invalid or expired. Please try requesting a new one.')
            );
            return $this->render('/message', [
                'title'  => \Yii::t('user', 'Invalid or expired link'),
                'module' => $this->module,
            ]);
        }

        /** @var RecoveryForm $model */
        $model = \Yii::createObject([
            'class'    => RecoveryForm::className(),
            'scenario' => RecoveryForm::SCENARIO_RESET,
        ]);
        $event->setForm($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_RESET, $event);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->resetPassword($token)) {
            $this->trigger(self::EVENT_AFTER_RESET, $event);
            return $this->render('/message', [
                'title'  => \Yii::t('user', 'Password has been changed'),
                'module' => $this->module,
            ]);
        }

        return $this->render('@app/views/account/overriden/recovery/reset', [
            'model' => $model,
        ]);
    }


    /**
     * Displays the login page.
     *
     * @return string|Response
     */
    public function actionLoginDel()
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
            return $this->goBack();
        }

        return $this->renderAjax('@app/views/account/overriden/security/login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }




}
