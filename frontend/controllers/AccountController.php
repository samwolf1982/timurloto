<?php
namespace frontend\controllers;

use app\models\WagerSearch;
use common\models\Playlist;
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

/**
 * Site controller
 */
class AccountController extends Controller
{

    public function behaviors()
    {
        // index  -- only user
        // view   -- all user
        // todo if(view id is current user)  redirect
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view','messages'],
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
        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
        $balance  = number_format($b, 0, '', ',');
        return $this->render('view',['balance'=>$balance] );

//        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
//        $balance  = number_format($b, 0, '', ',');
//        return $this->render('index',['balance'=>$balance] );
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



}
