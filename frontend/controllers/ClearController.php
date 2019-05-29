<?php
namespace frontend\controllers;

use app\models\WagerSearch;
use common\models\helpers\ConstantsHelper;
use common\models\Playlist;
use common\models\search\BalancestatisticsSearch;
use common\models\services\AccessInfo;
use common\models\services\DoSome;
use common\models\Subscriber;
use common\models\User;
use Exception;
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
class ClearController extends Controller
{


    public function actionIndex()
    {
        Yii::$app->cache->flush();
        return $this->render('index',[] );
    }
    public function actionMail($from='',$to='')
    {

     //   var_dump($from); die();
        if(empty($from)) $from='My Name <infoadmin@lookmybets.com';
        if(empty($to)) $to='96e3b1364e@himail.online';
        Yii::$app->mailer->compose()
            ->setFrom($from)
            ->setTo($to)
            ->setSubject('tema message')
            ->setTextBody('text mesage')
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->send();
        $message='Отправлено';

        return $this->render('mail',['message'=>$message] );
    }


}
