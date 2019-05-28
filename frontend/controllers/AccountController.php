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
class AccountController extends Controller
{




    private  $actionJsonList=['addsubscriber','remove-subscriber','chart','add-mail-subscriber','remove-mail-subscriber','autocomplete-comment'];
    public function behaviors()
    {


        // index  -- only user
        // view   -- all user
        // todo if(view id is current user)  redirect
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','addsubscriber', 'view','messages','chart','add-mail-subscriber','remove-mail-subscriber','open-access','autocomplete-comment'],
                'denyCallback' => function ($rule, $action) {
                    // redirect на главную с отображением формы для входа
                    yii::$app->session->addFlash(ConstantsHelper::SHOW_MODAL_AFRER_LOAD_PAGE, ConstantsHelper::SHOW_MODAL_USER_LOGIN_MAIN_FORM, true);
                    $this->redirect( Url::toRoute(['/']));
                 //   $this->redirect( Url::toRoute(['/login-page']),302);
//                    throw new Exception('У вас нет доступа к этой странице');
                },
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view','chart'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','messages','open-access','autocomplete-comment'],
                        'roles' => ['@'],
//                        'matchCallback' => function ($rule, $action) {
//                            return date('d-m') === '31-10';
//                        }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['addsubscriber','remove-subscriber','add-mail-subscriber','remove-mail-subscriber'],
                        'roles' => ['@'],
                        'verbs'=>['post']
                    ],
                ],
            ],

             [
                 'class' => 'yii\filters\PageCache',
                 'only' => ['view'],
                 'variations'=>[Yii::$app->request->get('id')],
                 'duration' => YII_ENV=='prod'? 3600:15,
//                'duration' => YII_ENV=='prod'? 1:1,
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(id) FROM `wager` WHERE user_id = '.Yii::$app->request->get('id').';',
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

        // todo убрать возможно (g)
        // сюда можно попасть и без кошелька fix если нету тогда создаем
        if(!empty( Yii::$app->user->id)) DoSome::createBalance( Yii::$app->user->id);

        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
        $balance  = number_format($b, 0, '', ',');
        $accessInfo=new  AccessInfo(Yii::$app->user->id);
        $accessInfoAccount=$accessInfo->getData();
        $weekNum=$accessInfo->getWeekNum(Yii::$app->user->id);
        $top100=$accessInfo->getTop100(Yii::$app->user->id);

        return $this->render('index',['balance'=>$balance,'accessInfoAccount'=>$accessInfoAccount,'weekNum'=>$weekNum,'top100'=>$top100] );
    }


    /**
     * Displays homepage OTher user.
     *
     * @return mixed
     */
    public function actionView($id)
    {
// todo для несуществующего сюда попадать не должны

        if($id==Yii::$app->user->id){
            // сюда можно попасть и без кошелька fix если нету тогда создаем
            if(!empty( Yii::$app->user->id)) DoSome::createBalance( Yii::$app->user->id);
            $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
            $balance  = number_format($b, 0, '', ',');
            $accessInfo=new  AccessInfo(Yii::$app->user->id);
            $accessInfoAccount=$accessInfo->getData();
            $weekNum=$accessInfo->getWeekNum(Yii::$app->user->id);
            $top100=$accessInfo->getTop100(Yii::$app->user->id);
            return $this->render('index',['balance'=>$balance,'accessInfoAccount'=>$accessInfoAccount,'weekNum'=>$weekNum,'top100'=>$top100] );
        }else{
            $b= Score::find()->where(['user_id' => $id])->one()->balance;
            $balance  = number_format($b, 0, '', ',');
            $accessInfo=new  AccessInfo($id);
            $accessInfoAccount=$accessInfo->getData();
            $weekNum=$accessInfo->getWeekNum($id);
            $top100=$accessInfo->getTop100($id);
            return $this->render('view',['balance'=>$balance,'accessInfoAccount'=>$accessInfoAccount,'weekNum'=>$weekNum,'top100'=>$top100]);
        }


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
                $user=  User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
                $countOpenMe=0;
                if($user){
                    $countOpenMe =   $user->getCountOpenMe($user->id);
                }
                return ['status'=>'o2k','id'=>Yii::$app->request->post("Subscriber")['id'],'countOpenMe'=>$countOpenMe];
            }
        }
        return ['status'=>'error','errors'=>$moduleSubscribers->getErrorList()];

    }


    public function actionRemoveMailSubscriber()
    {
        /** @var SubscriberModule $moduleSubscribers */
        $moduleSubscribers = \Yii::$app->getModule('subscribers');
        if(  $moduleSubscribers->prevalidateRemoveSubscriber()){

            if($moduleSubscribers->removeMailSubscriber(Yii::$app->request->post("Subscriber")['id'])){
                return ['status'=>'o2k'];
            }

        }
        return ['status'=>'error','errors'=>$moduleSubscribers->getErrorList()];

    }


    public function actionAddMailSubscriber()
    {
        /** @var SubscriberModule $moduleSubscribers */
        $moduleSubscribers = \Yii::$app->getModule('subscribers');
        if(  $moduleSubscribers->prevalidateMail()){
            if($moduleSubscribers->addMailSubscriber(Yii::$app->request->post("Subscriber")['id'],'25 year')){
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

    /**
     * Displays list message.    REST api
     *
     * @return mixed
     */
    public function actionChart($id)
    {
        $search=new   BalancestatisticsSearch();
        $search_result= $search->searchChart($id);


        return $search_result;
    }


    /**
     * ОТКРЫТЫЕ ДОСТУПЫ
     * @return array
     */
    public function actionOpenAccess($uid=null)
    {
        $openMe=[];
        $openForMe=[];
        if(!empty($uid)){

        }else{

            if(Yii::$app->user->isGuest){

            }else{
            $user=  User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
                          if($user){
                      $openMe=$user->getOpenMe(Yii::$app->user->identity->getId());
                    //  yii::error($openMe[0]->userown->imguse->avatar);
                      // test loop
//                              foreach ($openMe as $us) {
//                                $u=  $us->userown;
//                                  yii::error($u);
//                                                        }
                      $openForMe=$user->getOpenedForMe(Yii::$app->user->identity->getId());
                      yii::error($openForMe);
                             }
            }
        }
        return $this->renderAjax('openAccess',['openMe'=>$openMe,'openForMe'=>$openForMe] );
    }



    /**
     * Мои подписки
     * @return array
     */
    public function actionMySubscriptions($uid=null)
    {

        $openMe=[];
        $openForMe=[];
        if(!empty($uid)){

        }else{

            if(Yii::$app->user->isGuest){

            }else{
                $user=  User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
                if($user){
                    $mySubscriptions=$user->getMySubscriptions(Yii::$app->user->identity->getId());
                    $countSubsMail=  $user->getCountSubscriberMail();
                   // $openForMe=$user->getOpenedForMe(Yii::$app->user->identity->getId());
                }
            }
        }
        return $this->renderAjax('mySubscriptions',['countSubsMail'=>$countSubsMail, 'mySubscriptions'=>$mySubscriptions] );
    }

    /**
     * Мои подписчики
     * @return array
     */
    public function actionMySubscribers($uid=null)
    {

        $openMe=[];
        $openForMe=[];
        if(!empty($uid)){

        }else{

            if(Yii::$app->user->isGuest){

            }else{
                $user=  User::find()->where(['id'=>Yii::$app->user->identity->getId()])->one();
                if($user){
                    $mySubscribers=$user->getMySubscribers(Yii::$app->user->identity->getId());
                    $countSubsMail=  $user->getCountSubscribersMail();
                    // $openForMe=$user->getOpenedForMe(Yii::$app->user->identity->getId());
                }
            }
        }
        return $this->renderAjax('mySubscribers',['countSubsMail'=>$countSubsMail, 'mySubscribers'=>$mySubscribers] );
    }





    /**
     * автозаполнение коментов подпискчиков
     * @return array
     */
    public function actionAutocompleteComment($uid)
    {
            if(!Yii::$app->user->isGuest) {
                $text=substr(trim( Yii::$app->request->post("Subscriber")['text']),0,ConstantsHelper::LENGTH_COMMENT_ACCESS_USER);
                $user = User::find()->where(['id' => Yii::$app->user->identity->getId()])->one();
                if ($user) {
                  $s=Subscriber::find()->where(['user_own_id'=>Yii::$app->user->identity->getId(),'user_sub_id'=>$uid])->one();
                  if($s){
                      if( $s->text !== $text){
                          $s->text= trim( $text);
                          if($s->update(false)){
                              return ['status'=>'ok'] ;
                          }else{
                              return ['status'=>'update bad'];
                          }
                      }
                  }
                }
            }
        return ['status'=>'actionAutocompleteComment Bad no if'];
    }




    public function beforeAction($action)
    {

        if(in_array($action->id,$this->actionJsonList))  Yii::$app->response->format = Response::FORMAT_JSON;

        if(!Yii::$app->user->isGuest) {

            if(Yii::$app->user->id == Yii::$app->request->get('id') && !is_null(Yii::$app->request->get('id')) ){
                // todo hz
//                var_dump([Yii::$app->user->id , Yii::$app->request->get('id')]);
                // если не chart// назвал переменую для чарта ид и получилась колизия. будет время поправлю
//                if($action->id!='chart'){
//                    $this->redirect('/account',302);
//                }

            }
        }




        return parent::beforeAction($action);
    }



}
