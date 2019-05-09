<?php
namespace frontend\controllers;

use app\models\WagerSearch;
use common\models\helpers\ConstantsHelper;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use common\models\services\AccessInfo;
use common\models\Subscriber;
use common\models\User;
use frontend\modules\subscribers\SubscriberModule;
use komer45\balance\models\Score;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;

/**
 * Site controller
 */
class SuccessResetController extends Controller
{

    /**
     * Displays homepage OWN.
     * @return mixed
     */
    public function actionIndex()
    {
        yii::$app->session->addFlash(ConstantsHelper::SHOW_MODAL_AFRER_LOAD_PAGE,ConstantsHelper::SHOW_MODAL_SUCCESS_RESET_MODAL,true);
        return $this->redirect('/');
     //   return $this->render('index',[] );
    }




}
