<?php
namespace frontend\controllers;

use app\models\Game;
use app\models\Turnire;
use app\models\Turnirename;
use app\models\Typegame;
use app\models\Typegamename;
use common\models\helpers\HtmlGenerator;
use common\models\services\EventLine;
use common\models\services\FiltertCountryBySport;
use dektrium\user\filters\AccessRule;
//use dvizh\cart\Cart;
use dvizh\cart\Cart;

use komer45\balance\models\Score;
use Yii;
use yii\base\DynamicModel;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;

die('test hook 4');
/**
 * Site controller
 */
class DashboardController extends Controller
{

    public function actionIndex()
    {

        // было
     //   Yii::$app->user->setReturnUrl(Yii::$app->request->url); // url для переадресации на текушую страничку для логина чекрез соц сети.

        return $this->render('index',[]);


    }




    /**
     *      первый уровень
     * @return array
     */
    public function actionGetByCountry(){
        if(Yii::$app->request->post('id')){
          $filter= new  FiltertCountryBySport(Yii::$app->request->post('id'),null,null);
          $resultFilter=$filter->getTurnires();
          return ['array'=>$resultFilter,'html'=>HtmlGenerator::dashboardCountry($resultFilter) ] ;
        }
      return ['fail'];
   }
    /**
     *      второй уровень
     * @return array
     */
    public function actionGetByCountryGroup(){
        if(Yii::$app->request->post('id')){
            $filter= new  FiltertCountryBySport(null,Yii::$app->request->post('id'),null);
            $resultFilter=$filter->getTurniresByCountry();
            return ['array'=>$resultFilter,'html'=>HtmlGenerator::dashboardCountryByGroup($resultFilter) ];
        }
        return ['fail'];
    }



    /**
     *      финальная ссылка
     * @return array
     */
    public function actionGetByCountryGroupFin(){

        if(Yii::$app->request->post('id')){
            $filter= new  FiltertCountryBySport(null,null,Yii::$app->request->post('id'));
            $resultFilter=$filter->getTurniresByCountryFin();
            $html_block=HtmlGenerator::dashboardCountryByGroupFinBlock($resultFilter);
            return ['array'=>$resultFilter,'html_block'=>$html_block ];
        }
        return ['fail'];
    }


    /**
     *      получить линию
     * @return array
     */
    public function actionGetLine(){

        if(Yii::$app->request->post('id')){
            $eventLine= new  EventLine(Yii::$app->request->post('id'));
            $resultFilter=$eventLine->getLine();
            $html_block=HtmlGenerator::dashboardLine($resultFilter,$eventLine);
            return ['array'=>$resultFilter,'html_block'=>$html_block ];
        }
        return ['fail'];
    }



//    public function actions() {
//        return [
//                'auth' => [
//                    'class' => 'yii\authclient\AuthAction',
//                    'successCallback' => [$this, 'onAuthSuccess'],
//                    'successUrl' => Url::to(['profile/successAuth']),
//                ],
//
//    ];
//}

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
//                    [
//                        'actions' => ['create'],
//                        'allow' => true,
//                        'roles' => ['admin'],
//                    ],
                    [
                        'verbs' => ['POST','GET'],
                        'actions' => ['get-by-country','get-by-country-group','get-by-country-group-fin','get-line'],
                        'allow' => true,
//                        'roles' => ['?', '@', 'admin'],
//                        'roles' => [ 'simpleuser'],
                    ],
//                    [
//                        'verbs' => ['POST'],
//                        'actions' => ['leveltwo','levelthree'],
//                        'allow' => true,
////                        'roles' => ['?', '@', 'admin'],
//                        'roles' => [ 'simpleuser'],
//                    ],
//
//                    [
//                        'actions' => ['view', 'search','index','create','update'],
//                        'allow' => true,
////                        'roles' => ['?', '@', 'admin'],
//                        'roles' => [ 'simpleuser','?','@','admin'],
//                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
//                        'roles' => ['?', '@', 'admin'],
//                        'roles' => [ 'simpleuser'],
                    ],
                ],
            ],
        ];
    }


    public function beforeAction($action)
    {
        $json_action_list=['get-by-country','get-by-country-group','get-by-country-group-fin','get-line'];
         if(in_array($action->id,$json_action_list)){\Yii::$app->response->format = Response::FORMAT_JSON;}
        return parent::beforeAction($action);
    }

}
