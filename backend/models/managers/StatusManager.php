<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 14.09.2018
 * Time: 20:34
 */

namespace app\models\managers;


use common\models\Balancestatistics;
use common\models\StatisticsManagerCommon;
use common\models\Wager;
use common\models\Wagerelements;
use komer45\balance\models\Score;
use komer45\balance\models\Transaction;
use Yii;

class StatusManager
{
    /**@var  Wagerelements $model**/
        private  $model;
        private $post_value;


    /**
     * StatusManager constructor.
     * @param $id_model
     */
    public function __construct($model,$post_value)
    {
        $this->model=$model;
        $this->post_value=$post_value;
    }


    public function recalculateStatus(){
        // todo stope here
        $this->changeStatusSiblingsElements();
        $this->changeStatusParents();
    }


    /**
     * смена значения для потомков 1
     */
    private function changeStatusSiblingsElements(){
        /**@var Wagerelements $class **/
        $class=  get_class($this->model);
//        $class::updateAll(['status'=>$this->post_value],['=','event_id',$this->model->event_id]);
        foreach ($class::find()->where(['=','event_id',$this->model->event_id])->andWhere(['!=','status',Wager::STATUS_PAID_FOR]) ->all() as $item) { //  STATUS_PAID_FOR not use
            $item->status=      $this->post_value;
            $item->update(false);
        }

    }

    private function reupdateBalance($wager,$newStatus)
    {
        $score_id = Score::find()->where(['user_id' => $wager->user_id])->one()->id;
        $modelTransaction = new Transaction();
        $total_sum=$wager->total*$wager->coef;
        $prevWagerStatusGate=false; // для определения что ставка раньше не была обработана
        if($wager->status == Wager::STATUS_ENTERED || $wager->status == Wager::STATUS_NOT_ENTERD ||  $wager->status == Wager::STATUS_RETURN_BET){
            if($wager->status == Wager::STATUS_ENTERED){ // cтавка была зашла нужно отнять
                $param = ['type' => 'out', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Мануально пересчет cнятие (a1): '.$wager->id];
            }
            if($wager->status == Wager::STATUS_NOT_ENTERD){ // cтавка была зашла нужно добавить суму что проиграл
                $param = ['type' => 'in', 'amount' => abs($wager->total), 'balance_id' => $score_id, 'refill_type' => 'Мануально пересчет добавить (a2): '.$wager->id];
            }
            if($wager->status == Wager::STATUS_RETURN_BET){ // cтавка была зашла нужно отнять
                $param = ['type' => 'out', 'amount' => abs($wager->total), 'balance_id' => $score_id, 'refill_type' => 'Мануально пересчет cнятие (a3): '.$wager->id];
            }
            $modelTransaction->attributes = $param;
            if ($modelTransaction->validate()) {
                $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
            }
            $prevWagerStatusGate=true;
        }

        //--------добавление или снятие
        if($newStatus == Wager::STATUS_ENTERED || $newStatus == Wager::STATUS_NOT_ENTERD ||  $newStatus == Wager::STATUS_RETURN_BET){
            if($newStatus == Wager::STATUS_ENTERED){ // cтавка зашла мануально
                $param = ['type' => 'in', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Мануально пересчет добавить (a4): '.$wager->id];
            }
            if($newStatus == Wager::STATUS_NOT_ENTERD and $prevWagerStatusGate){ // cтавка не зашла
                $param = ['type' => 'out', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Мануально пересчет cнять (a5): '.$wager->id];
            }
            if($newStatus == Wager::STATUS_RETURN_BET){ // cтавка возврать
                $param = ['type' => 'in', 'amount' => abs($total_sum), 'balance_id' => $score_id, 'refill_type' => 'Мануально пересчет добавить (a6): '.$wager->id];
            }

            $modelTransaction->attributes = $param;
            if ($modelTransaction->validate()) {
                $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
            }
        }



    }

    private function changeStatusParents(){
        /**@var Wagerelements $class **/
        $class=  get_class($this->model);
        /**@var Wagerelements $item **/
        foreach ($class::find()->where(['event_id'=>$this->model->event_id])->all() as $item) {
            if($item->wager->checkCloseElements()){ // все внутрение прошли
           //     if(!$item->wager->checkCloseState()){  // но родитель еще не прошел
//Yii::error(['checkCloseElements '=>'oki']);
                              $newStatus=$item->wager->getFinalStatus();
                              yii::error(['nesStat'=>$newStatus]);
                //удалить пред статистик
                $bs=  Balancestatistics::find()->where(['wager_id'=>$item->wager->id])->one();
                if($bs) $bs->delete();
                // смена баланса
                $this->reupdateBalance($item->wager,$newStatus);



                              //if($newStatus!=Wager::STATUS_PAID_FOR){ // пропуск если ранее уже был подсчет
                                  $item->wager->status= $newStatus;
                                  //Wager::STATUS_CLOSE;
                                  $item->wager->update(false);

                $stm= new  StatisticsManagerCommon($item->wager);
                $stm->calculateStatistics();

                $postStatus=Yii::$app->request->post('statusName');
                if($postStatus=='win') $newStatus=Wager::STATUS_ENTERED;  //6
                elseif ($postStatus=='return') $newStatus=Wager::STATUS_RETURN_BET; // 10
                elseif ($postStatus=='lost') $newStatus=Wager::STATUS_NOT_ENTERD; // 7
                elseif ($postStatus=='manual') $newStatus=Wager::STATUS_MANUAL_BET; // 11 // not use

                                  // change statiostics

                              //}



                }
          //  }
        }

           // $class::updateAll(['status'=>$this->post_value],['=','event_id',$this->model->event_id]);
    }

}