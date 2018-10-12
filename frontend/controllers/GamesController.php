<?php
namespace frontend\controllers;

use app\models\Game;
use app\models\Turnire;
use app\models\Turnirename;
use app\models\Typegame;
use app\models\Typegamename;
use dektrium\user\filters\AccessRule;
use Yii;
use yii\base\DynamicModel;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class GamesController extends Controller
{



    /**
     *
     * @return mixed  Список чемпионатов:
     */
    public function actionLeveltwo()
    {

      $type_sport_id=  $_POST['depdrop_parents'][0];
        $type_game=Typegamename::find()->where(['id'=>$type_sport_id])->one();
        if ($type_game){

            $res=[];
            foreach ($type_game->typegames as $item) {
            // yii::error($item->turnire->turnirename->name);
                $res[]=['id'=>$item->id_turnire, 'name' => $item->turnire->turnirename->name];

            }
        }
        // depdrop_parents[0]
        $f_id=0;
        if (!empty($res)){$f_id=$res[0]['id']; }
        return  Json::encode(  \yii\helpers\ArrayHelper::merge(parent::actions(), [
            //'subcategory' => [
//                'class' => \kartik\depdrop\DepDropAction::className(),
                'output' =>$res,
    //              [

//                        [
//                            'id' => 1,
//                            'name' => 'Car',
//                        ],
//                        [
//                            'id' => 2,
//                            'name' => 'bike',
//                        ],
                  //  ],
           "selected"=>$f_id,



           // ]
        ]));

    }


    /**
     *
     * @return mixed  Список чемпионатов:
     */
    public function actionLevelthree()
    {

        $type_sport_id=  $_POST['depdrop_parents'][0];
        $type_game=Game::find()->where(['id_turnire'=>$type_sport_id])->all();
        if ($type_game){
            $res=[];
            foreach ($type_game as $item) {
                $match_txt=sprintf('%s - %s время: %s',$item->teamA->name,$item->teamB->name, date_format(date_create($item->time_game), 'Y-m-d H:i')  );


                $res[]=['id'=>$item->id, 'name' =>$match_txt];

            }
        }
        // depdrop_parents[0]
        $f_id=0;
        if (!empty($res)){$f_id=$res[0]['id']; }
        return  Json::encode(  \yii\helpers\ArrayHelper::merge(parent::actions(), [
            //'subcategory' => [
//                'class' => \kartik\depdrop\DepDropAction::className(),
            'output' =>$res,
            //              [

//                        [
//                            'id' => 1,
//                            'name' => 'Car',
//                        ],
//                        [
//                            'id' => 2,
//                            'name' => 'bike',
//                        ],
            //  ],
            "selected"=>$f_id,



            // ]
        ]));

    }



    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $type_game=Typegamename::find()->where(1)->all();
        $model=new Typegamename();
        $model_two=new Turnirename();
       // $model_two= Typegamename::find()->where(['id'=>$type_game[0]->id])->one();
        $id=0;
        $name='';
        $model_three= new DynamicModel(compact('id', 'name'));

        return $this->render('index',compact('type_game','model','model_two','model_three'));

    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'verbs' => ['POST'],
                        'actions' => ['leveltwo','levelthree'],
                        'allow' => true,
//                        'roles' => ['?', '@', 'admin'],
                        'roles' => [ 'simpleuser'],
                    ],

                    [
                        'actions' => ['view', 'search','index','create','update'],
                        'allow' => true,
//                        'roles' => ['?', '@', 'admin'],
                        'roles' => [ 'simpleuser'],
                    ],
                ],
            ],
        ];
    }
}
