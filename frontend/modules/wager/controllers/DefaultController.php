<?php

namespace app\modules\wager\controllers;

use app\modules\wager\models\WagerManager;
use common\models\Balancestatistics;
use common\models\DTO\WagerInfo;
use common\models\helpers\ConstantsHelper;
use common\models\Playlist;
use common\models\services\UserInfo;
use common\models\StatisticsManagerCommon;
use common\models\Wager;
use komer45\balance\models\Score;
use komer45\balance\models\Transaction;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `wager` module
 */
class DefaultController extends Controller
{

    private  $actionJsonList=['add','konfirmi'];

    public function behaviors()
    {
        // index  -- all user
        // add   -- auth
        // todo if(view id is current user)  redirect
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['add'],
                        'roles' => ['@'],
                        'verbs' => ['POST']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['konfirmi'],
                        'verbs' => ['POST',"GET"]
                    ],
                ],
            ],
        ];
    }
    /**
     *
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }



    public function actionKonfirmi()
    {


//         Yii::error(  Yii::$app->request->post());
         Yii::error(  Yii::$app->request->post('typeName'));
        $bet= Yii::$app->request->post('bet');
        $bet_id=Yii::$app->request->post('bet_id');
        $user_id=Yii::$app->request->post('user_id');
         Yii::error( ['bet'=>$bet] );
         Yii::error(  $bet_id);
         Yii::error(  $user_id);


        $log =
            Yii::$app->request->post();
//        {"bet_id":"1","user_id":"44","statusName":"lost"},
//        {"bet_id":"2","user_id":"44","statusName":"win"},
//        {"bet_id":"3","user_id":"44","statusName":"lost"},

//        $file = fopen(__DIR__  . "/bets_log.txt", "a+");
//        $log = json_encode($log) .", \n";
//        fwrite($file, $log);
//        fclose($file);

         $typeName=Yii::$app->request->post('typeName'); // Single   Multiple

        $testVal=11;
        // обработчик для мануала
        if($typeName=="manual"){
            $bet= Yii::$app->request->post('bet');
            $bet_id=Yii::$app->request->post('bet_id');
            $user_id=Yii::$app->request->post('user_id');
            $wager=Wager::find()->where(['user_id' =>$user_id,'bid'=>$bet_id])->one();
            if($wager){
                $wager->status=Wager::STATUS_MANUAL_BET;
                if($wager->validate()){
                    $wager->save(false);
                }else{
                    Yii::error($wager->errors);
                }
            }

        }

        // обработчик для single
        if($typeName=="Single"){
          $bet= Yii::$app->request->post('bet');
          $bet_id=Yii::$app->request->post('bet_id');
          $user_id=Yii::$app->request->post('user_id');

          $wager=Wager::find()->where(['user_id' =>$user_id,'bid'=>$bet_id])->one();
            $testVal=12;
          if($wager){
              $testVal=13;
              $newStatus=-11;
//              if ($statusName === 'win' || $statusName === 'return') { STATUS_NOT_ENTERD STATUS_NOT_ENTERD STATUS_RETURN_BET


              $postStatus=Yii::$app->request->post('statusName');
                  if($postStatus=='win') $newStatus=Wager::STATUS_ENTERED;  //6
                  elseif ($postStatus=='return') $newStatus=Wager::STATUS_RETURN_BET; // 10
                  elseif ($postStatus=='lost') $newStatus=Wager::STATUS_NOT_ENTERD; // 7
                  elseif ($postStatus=='manual') $newStatus=Wager::STATUS_MANUAL_BET; // 11 // not use

                  $wager->status=$newStatus;

                  if($wager->validate()){
                      $testVal=14;
                      $wager->save(false);
                  }else{
                      $testVal=15;
                        Yii::error($wager->errors);
                  }

                  // добави ть баланс WIN
                  if($wager->status == Wager::STATUS_ENTERED){
                      $score_id = Score::find()->where(['user_id' => $user_id])->one()->id;
                      $modelTransaction = new Transaction();
                      $total_sum=$wager->total*$wager->coef;
                      $param = ['type' => 'in', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Выигрыш: '.$wager->id];
                      $modelTransaction->attributes = $param;
                      if ($modelTransaction->validate()) {
                          $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                        $stm= new  StatisticsManagerCommon($wager);
                        $stm->calculateStatistics();
                      }
                  }elseif ($wager->status == Wager::STATUS_RETURN_BET){ // возврат
                      $score_id = Score::find()->where(['user_id' => $user_id])->one()->id;
                      $modelTransaction = new Transaction();
                      $total_sum=$wager->total;
                      $param = ['type' => 'in', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Возврат: '.$wager->id];
                      $modelTransaction->attributes = $param;
                      if ($modelTransaction->validate()) {
                          $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                          $stm= new  StatisticsManagerCommon($wager);
                          $stm->calculateStatistics();
                      }
                  }elseif ($wager->status == Wager::STATUS_NOT_ENTERD) { // проигрыш
                      $stm = new  StatisticsManagerCommon($wager);
                      $stm->calculateStatistics();
                  }






              Yii::error(['user_id' => $user_id,'bid'=>$bet_id,'nowager'=>0,'status'=>$wager->status]);

          }else{
              Yii::error(['user_id' => $user_id,'bid'=>$bet_id,'nowager'=>1]);
          }

        }elseif($typeName=="Multiple"){      // обработчик для мульти
            $bet= Yii::$app->request->post('bet');
            $bet_id=Yii::$app->request->post('bet_id');
            $user_id=Yii::$app->request->post('user_id');
            $wager=Wager::find()->where(['user_id' =>$user_id,'bid'=>$bet_id])->one();
            $testVal=12;


            if($wager){
                $newStatus=-11;
                $postStatus=Yii::$app->request->post('statusName');
                if($postStatus=='win') $newStatus=Wager::STATUS_ENTERED;  //6
                elseif ($postStatus=='return') $newStatus=Wager::STATUS_RETURN_BET; // 10
                elseif ($postStatus=='lost') $newStatus=Wager::STATUS_NOT_ENTERD; // 7

                $wager->status=$newStatus;

                if($wager->validate()){
                    $wager->save(false);
                }else{

                    Yii::error($wager->errors);
                }

                // добави ть баланс WIN
                if($wager->status == Wager::STATUS_ENTERED){
                    //todo
                    //ставка [['win','3'],['win','4'],['return','6'],]
                    //ставка [['win','3'],['win','4'],['win','6'],]

                    $score_id = Score::find()->where(['user_id' => $user_id])->one()->id;
                    $modelTransaction = new Transaction();
                    $total_sum=$wager->total*$wager->coef;
                    $param = ['type' => 'in', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Выигрыш: '.$wager->id];
                    $modelTransaction->attributes = $param;
                    if ($modelTransaction->validate()) {
                        $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                        $stm= new  StatisticsManagerCommon($wager);
                        $stm->calculateStatistics();
                    }
                }elseif ($wager->status == Wager::STATUS_RETURN_BET){ // возврат
                    $score_id = Score::find()->where(['user_id' => $user_id])->one()->id;
                    $modelTransaction = new Transaction();
                    $total_sum=$wager->total;
                    $param = ['type' => 'in', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Возврат: '.$wager->id];
                    $modelTransaction->attributes = $param;
                    if ($modelTransaction->validate()) {
                        $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                    }
                }elseif ($wager->status == Wager::STATUS_NOT_ENTERD) { // проигрыш
                    $stm= new  StatisticsManagerCommon($wager);
                    $stm->calculateStatistics();
                }





                Yii::error(['user_id' => $user_id,'bid'=>$bet_id,'nowager'=>0,'status'=>$wager->status]);

            }else{
                Yii::error(['user_id' => $user_id,'bid'=>$bet_id,'nowager'=>1]);
            }

        }






        yii::error(['typeName'=>$typeName]);
        return ['s'=>456,'errors_me'=>$wager->errors,'testVal'=>$testVal,'typeName'=>$typeName];
        $result=[];
        $errorLocalLog=[]; // LOg ошыбок
        // add balanse ONLY DEV
//        if(1){
//            $score_id=Score::find()->where(['user_id' => Yii::$app->user->identity->getId()])->one()->id;
//            $modelTransaction = new Transaction();
//            $param=['type'=>'in','amount'=>50000,'balance_id'=>$score_id,'refill_type'=>'some refill_type'];
//            $modelTransaction->attributes=$param;
//            $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type,$modelTransaction->amount, $modelTransaction->refill_type);
//        }

        if(WagerManager::preValidate(Yii::$app->request->post(),Yii::$app->user->identity->getId(),$errorLocalLog)){  //$errorLocalLog по ссылке


            // $total_sum =  WagerManager::calculateTotalSumForBet(Yii::$app->user->identity->getId(),$totalSumCoeficient,false); // ручнную сумму еще нужно доделать
            $total_sum =  WagerManager::calculateTotalSumForBet(Yii::$app->user->identity->getId(),(integer)Yii::$app->request->post('currentCooeficientDrop'),false); // ручнную сумму еще нужно доделать
            $result=  WagerManager::makeBet(Yii::$app->user->identity->getId(),Yii::$app->request->post(),$total_sum);
//            var_dump($result->data[0]); die();
//            var_dump($result); die();
            if($result->status===1){// снятие баланса подтверждение

                $score_id = Score::find()->where(['user_id' => Yii::$app->user->identity->getId()])->one()->id;
                $modelTransaction = new Transaction();
                $param = ['type' => 'out', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Снятие на ставку: '];
                $modelTransaction->attributes = $param;
                if ($modelTransaction->validate()) {
                    $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                    // если все ок тогда дублирование ставки   // старый код переделан -- start
                    $playlist_id=Yii::$app->request->post('playlist_id');
                    $coefficient= WagerManager::getFullCoeficientByPost(Yii::$app->request->post('CartElements'));;
                    $coefficient=Yii::$app->request->post('currentCooeficientDrop');
                    $open_close=  Yii::$app->request->post('statusBet')== 'private'? true :  false;
                    $tdo_Wager_user_info = new WagerInfo(Yii::$app->user->identity->getId(), $playlist_id, Yii::$app->request->post('comment'), $total_sum, $coefficient, $open_close,$result->data);
                    $vagerManager = new WagerManager(Yii::$app->request->post(), $tdo_Wager_user_info);
                    $vagerManager->add($result->bid);
                    // если все ок тогда дублирование ставки   // старый код переделан -- end

                    //   yii::error($addTransaction);
                } else {
                    yii::error($modelTransaction->errors);
                }



            }
        }else{
            $result=['status'=>'error','message'=>$errorLocalLog];
        }


        return    $result;
    }


    public function actionAdd()
    {

        $result=[];
        $errorLocalLog=[]; // LOg ошыбок
        // add balanse ONLY DEV
//        if(1){
//            $score_id=Score::find()->where(['user_id' => Yii::$app->user->identity->getId()])->one()->id;
//            $modelTransaction = new Transaction();
//            $param=['type'=>'in','amount'=>50000,'balance_id'=>$score_id,'refill_type'=>'some refill_type'];
//            $modelTransaction->attributes=$param;
//            $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type,$modelTransaction->amount, $modelTransaction->refill_type);
//        }

        if(WagerManager::preValidate(Yii::$app->request->post(),Yii::$app->user->identity->getId(),$errorLocalLog)){  //$errorLocalLog по ссылке


            // $total_sum =  WagerManager::calculateTotalSumForBet(Yii::$app->user->identity->getId(),$totalSumCoeficient,false); // ручнную сумму еще нужно доделать
            $total_sum =  WagerManager::calculateTotalSumForBet(Yii::$app->user->identity->getId(),(integer)Yii::$app->request->post('currentCooeficientDrop'),false); // ручнную сумму еще нужно доделать
            $result=  WagerManager::makeBet(Yii::$app->user->identity->getId(),Yii::$app->request->post(),$total_sum);
//            var_dump($result->data[0]); die();
//            var_dump($result); die();
            if($result->status===1){// снятие баланса подтверждение

                $score_id = Score::find()->where(['user_id' => Yii::$app->user->identity->getId()])->one()->id;
                $modelTransaction = new Transaction();
                $param = ['type' => 'out', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Снятие на ставку: '];
                $modelTransaction->attributes = $param;
                if ($modelTransaction->validate()) {
                    $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                    // если все ок тогда дублирование ставки   // старый код переделан -- start
                    $playlist_id=Yii::$app->request->post('playlist_id');
                    $coefficient= WagerManager::getFullCoeficientByPost(Yii::$app->request->post('CartElements'));;
                    $coefficient=Yii::$app->request->post('currentCooeficientDrop');
                    $open_close=  Yii::$app->request->post('statusBet')== 'private'? true :  false;
                    $tdo_Wager_user_info = new WagerInfo(Yii::$app->user->identity->getId(), $playlist_id, Yii::$app->request->post('comment'), $total_sum, $coefficient, $open_close,$result->data);
                    $vagerManager = new WagerManager(Yii::$app->request->post(), $tdo_Wager_user_info);
                    $vagerManager->add($result->bid);
                    // если все ок тогда дублирование ставки   // старый код переделан -- end

                    //   yii::error($addTransaction);
                } else {
                     yii::error($modelTransaction->errors);
                }



            }

            if(0) {  // старый код но еще будет использоваться для баланса
                $current_cart = Yii::$app->cart->getCart()->my();
                $total_sum = WagerManager::calculateTotalSum(Yii::$app->cart, Yii::$app->user->identity->getId(), $current_cart->coefficient, false); // ручнную сумму еще нужно доделать
                $tdo_Wager_user_info = new WagerInfo(Yii::$app->user->identity->getId(), $current_cart->playlist_id, Yii::$app->request->post('comment'), $total_sum, $current_cart->coefficient, $current_cart->status);
                $vagerManager = new WagerManager(Yii::$app->cart, $tdo_Wager_user_info);
                $vagerManager->add();

                $score_id = Score::find()->where(['user_id' => $tdo_Wager_user_info->getUserId()])->one()->id;
                // ставка добавлена  снятие баланса
                $modelTransaction = new Transaction();
                yii::error($total_sum);
//            'balance_id' => $this->integer(11)->notNull(), 'date' => $this->datetime()->null()->defaultValue(null), 'type' => "ENUM('in', 'out') NOT NULL", 'amount' => $this->decimal(12, 2)->notNull(), 'balance' => $this->decimal(12, 2)->notNull(), 'user_id'=> $this->integer(11)->notNull(), 'refill_type' => $this->string(255)->notNull(), 'canceled' => $this->datetime()->null()->defaultValue(null), 'comment' => $this->string(255)->null()->defaultValue(null),
                // $param=['type'=>'in','amount'=>(-1*abs($total_sum)),'balance_id'=>$score_id,'refill_type'=>'some refill_type'];
                $param = ['type' => 'out', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Снятие на ставку: '];
                $modelTransaction->attributes = $param;
                if ($modelTransaction->validate()) {
                    $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                    //   yii::error($addTransaction);
                } else {
                    yii::error($modelTransaction->errors);
                }
            }
        }else{
            $result=['status'=>'error','message'=>$errorLocalLog];
        }


       return    $result;
    }

    public function actionViewdetail($id)
    {
        $model=Wager::find()->where(['id'=>$id])->one();
        $userInfo= new UserInfo(Yii::$app->user->identity->getId());
//        $type_play
//        yii::error([$id,$model]);
        if($model){
            return $this->renderPartial('detail',['model'=>$model,'userInfo'=>$userInfo]);
        }
    }



//$('#demo-modal').load('get-dynamic-content.php?modal='+modal).dialog(options).dialog('open');


    public function beforeAction($action)
    {
        if(in_array($action->id,$this->actionJsonList))  Yii::$app->response->format = Response::FORMAT_JSON;
        if ($action->id == 'konfirmi') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}
