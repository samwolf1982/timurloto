<?php
namespace frontend\controllers;

use app\models\WagerSearch;
use common\models\Playlist;
use common\models\Subscriber;
use frontend\modules\subscribers\SubscriberModule;
use komer45\balance\models\Score;
use Yii;
use yii\base\InvalidParamException;
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
class AccountController extends Controller
{

    private  $actionJsonList=['addsubscriber','remove-subscriber'];

    public function behaviors()
    {
        // index  -- only user
        // view   -- all user
        // todo if(view id is current user)  redirect
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','addsubscriber', 'view','messages'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','messages'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['addsubscriber','remove-subscriber'],
                        'roles' => ['@'],
                        'verbs'=>['post']
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays homepage OWN.
     *
     * @return mixed
     */
    public function actionIndex()
    {

//      Yii::$app->user->id;
//        $playlists=Playlist::find()->where(['user_id'=>Yii::$app->user->id, 'status'=>Playlist::STATUS_ON])->asArray()->all();

        //$statistic = \Yii::$app->getModule('statistic');
//       var_dump($statistic);


        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
        $balance  = number_format($b, 0, '', ',');
        return $this->render('index',['balance'=>$balance] );
    }


    /**
     * Displays homepage OTher user.
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $b= Score::find()->where(['user_id' => $id])->one()->balance;
        $balance  = number_format($b, 0, '', ',');
        return $this->render('view',['balance'=>$balance]);

    }


    public function actionAddsubscriber()
    {
        /** @var SubscriberModule $moduleSubscribers */
        $moduleSubscribers = \Yii::$app->getModule('subscribers');
        Yii::$app->request->post("Subscriber['id']");
      if(  $moduleSubscribers->prevalidate()){
              if($moduleSubscribers->addSubscriber(Yii::$app->request->post("Subscriber")['id'],Yii::$app->request->post("Subscriber")['period'])){
                                 return ['status'=>'o2k'];
                }

      }
      return ['status'=>'error','errors'=>$moduleSubscribers->getErrorList()];

    }

    public function actionRemoveSubscriber()
    {
        /** @var SubscriberModule $moduleSubscribers */
        $moduleSubscribers = \Yii::$app->getModule('subscribers');
        if(  $moduleSubscribers->prevalidateRemoveSubscriber()){

            if($moduleSubscribers->removeSubscriber(Yii::$app->request->post("Subscriber")['id'])){
                return ['status'=>'o2k'];
            }

        }
        return ['status'=>'error','errors'=>$moduleSubscribers->getErrorList()];

    }

    /**
     * Displays list message.    REST api
     *
     * @return mixed
     */
    public function actionMessages()
    {
        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
        $balance  = number_format($b, 0, '', ',');
        return $this->render('message',['balance'=>$balance] );
    }


    public function beforeAction($action)
    {
        if(in_array($action->id,$this->actionJsonList))  Yii::$app->response->format = Response::FORMAT_JSON;

        if(!Yii::$app->user->isGuest) {
            if(Yii::$app->user->id == Yii::$app->request->get('id')){
                            $this->redirect('/account',302);
            }

            //die();
        }


        return parent::beforeAction($action);
    }

}
