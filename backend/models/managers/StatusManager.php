<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 14.09.2018
 * Time: 20:34
 */

namespace app\models\managers;


use common\models\Wager;
use common\models\Wagerelements;
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
        $this->changeStatusSiblingsElements();
        $this->changeStatusParents();
    }

    private function changeStatusSiblingsElements(){
        /**@var Wagerelements $class **/
        $class=  get_class($this->model);
//        $class::updateAll(['status'=>$this->post_value],['=','event_id',$this->model->event_id]);
        foreach ($class::find()->where(['=','event_id',$this->model->event_id])->andWhere(['!=','status',Wager::STATUS_PAID_FOR]) ->all() as $item) {
            $item->status=      $this->post_value;
            $item->update(false);
        }

    }


    private function changeStatusParents(){
        /**@var Wagerelements $class **/
        $class=  get_class($this->model);
        /**@var Wagerelements $item **/
        foreach ($class::find()->where(['event_id'=>$this->model->event_id])->all() as $item) {
            if($item->wager->checkCloseElements()){ // все внутрение прошли
           //     if(!$item->wager->checkCloseState()){  // но родитель еще не прошел

                              $newStatus=$item->wager->getFinalStatus();

                              //if($newStatus!=Wager::STATUS_PAID_FOR){ // пропуск если ранее уже был подсчет
                                  $item->wager->status= $newStatus;
                                  //Wager::STATUS_CLOSE;
                                  $item->wager->update(false);
                              //}



                }
          //  }
        }

           // $class::updateAll(['status'=>$this->post_value],['=','event_id',$this->model->event_id]);
    }

}