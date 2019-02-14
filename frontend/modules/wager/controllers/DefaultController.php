<?php

namespace app\modules\wager\controllers;

use app\modules\wager\models\WagerManager;
use common\models\DTO\WagerInfo;
use common\models\Playlist;
use common\models\services\UserInfo;
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

    private  $actionJsonList=['add'];

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
          //  var_dump($result->status); die();
            if($result->status===1){// снятие баланса подтверждение

                $score_id = Score::find()->where(['user_id' => Yii::$app->user->identity->getId()])->one()->id;
                $modelTransaction = new Transaction();
                $param = ['type' => 'out', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Снятие на ставку: '];
                $modelTransaction->attributes = $param;
                if ($modelTransaction->validate()) {
                    $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                    // если все ок тогда дублирование ставки   // старый код переделан
                    $vagerManager = new WagerManager(Yii::$app->cart, $tdo_Wager_user_info);
                    $vagerManager->add();

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
        return parent::beforeAction($action);
    }
}
