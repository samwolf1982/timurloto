<?php
namespace frontend\controllers;

use app\models\Game;
use app\models\Turnire;
use app\models\Turnirename;
use app\models\Typegame;
use app\models\Typegamename;
use app\modules\statistic\models\WagerStatisticManager;
use common\models\DTO\betreport\TopOneHandred;
use common\models\helpers\ConstantsHelper;
use common\models\helpers\HtmlGenerator;
use common\models\search\BalancestatisticsSearch;
use common\models\search\BalancestatisticsSearchTop;
use dektrium\user\filters\AccessRule;
//use dvizh\cart\Cart;
use dvizh\cart\Cart;
use komer45\balance\models\Score;
use Yii;
use yii\base\DynamicModel;
use yii\base\InvalidParamException;
use yii\data\ArrayDataProvider;
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
class BetController extends Controller
{



    /**
     * index page видит только пользователь своя
     * @return mixed
     */
    public function actionIndex()
    {



           // var_dump(  date("Y-m-d H:i:s")); die();
          //  var_dump($sql2); die();

        $model=new Typegamename();
        $model->name='some name';
        $model->line='line';
//        $model->save(false);

        $id=0;
        $name='';

        $model_three= new DynamicModel(compact('id', 'name')); // hz

        $searchModel = new BalancestatisticsSearch();
        // идет в виджет Topusers
        $dataProvider = $searchModel->search_custom_last_week_live(Yii::$app->request->queryParams);

        // идет в РЕЙТИНГ ПОЛЬЗОВАТЕЛЕЙ месяц ,,,
        $searchModel2 = new BalancestatisticsSearch();
        $dataProvider2 = $searchModel2->search_custom_last_week_with_plus(Yii::$app->request->queryParams);  // top 100




        if(Yii::$app->request->get('period')==ConstantsHelper::PERIOD_ALL){ $periodOne='';$period3m='';$periodAll='active';
        }elseif (Yii::$app->request->get('period')==ConstantsHelper::PERIOD_3_M) { $periodOne='';$period3m='active';$periodAll='';

        }else { $periodOne='active';$period3m='';$periodAll='';  }


        return $this->render('index',compact('type_game','model','model_two','model_three','dataProvider','dataProvider2',
            'periodOne','period3m','periodAll'));

    }


    /**
     * index page видят все
     * @return mixed
     */
    public function actionView($id)
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
                       //'actions' => ['view', 'search','index','create','update','nextload'],
                        'actions' => ['view','index','nextload'],
                        'allow' => true,
//                      'roles' => ['?', '@', 'admin'],
                        'roles' => [ 'simpleuser','?','@','admin'],
                    ],

                    [
                        'actions' => ['jsontop'],
                        'allow' => true,
                        'roles' => ['?', '@', 'admin'],
//                        'roles' => [ 'simpleuser'],
                    ],
                ],
            ],
        ];
    }


    public function actionNextload()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user_id = !empty(yii::$app->user->identity->id)?yii::$app->user->identity->id:-1 ;
        if ($user_id === NULL)  $user_id = -1;

        $offset=Yii::$app->request->post('offset');

        if(empty($offset)){
            $offset=6;
        }

       // $wagers = new  WagerStatisticManager($user_id ,[]);
        $wagers = new  WagerStatisticManager($user_id ,['offset'=>$offset]);
        $wagersModels= $wagers->getNextWagers();
        $html=HtmlGenerator::nextBets($wagersModels);

        return ['offset'=>($offset+ConstantsHelper::COUNT_LOAD_NEXT_IN_BET) ,'models'=>$wagersModels,'html'=>$html];
    }


    public function actionJsontop()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        {
//            "records": [
//    {
//        "someAttribute": "I am record one",
//      "someOtherAttribute": "Fetched by AJAX"
//    },
//    {
//        "someAttribute": "I am record two",
//      "someOtherAttribute": "Cuz it's awesome"
//    },
//    {
//        "someAttribute": "I am record three",
//      "someOtherAttribute": "Yup, still AJAX"
//    }
//  ],
//  "queryRecordCount": 3,
//  "totalRecordCount": 3
//}
        $arr =["records"=>[
            ['name'=>'fdsafadsf','name2'=>'dasfsdafadsfasdf'],
            ['name'=>'fdsafadsf','name2'=>'dasfsdafadsfasdf'],
            ['name'=>'fdsafadsf','name2'=>'dasfsdafadsfasdf'],

        ],
            'queryRecordCount'=>3,
            'totalRecordCount'=>3
            ];

        return $arr;

    }
    
    
    
    
}
