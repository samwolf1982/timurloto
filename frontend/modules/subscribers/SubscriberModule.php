<?php

namespace frontend\modules\subscribers;
use common\models\helpers\ConstantsHelper;
use common\models\Subscriber;
use common\models\User;
use Yii;
use yii\base\ErrorException;

/**
 * subscribers module definition class
 */
class SubscriberModule extends \yii\base\Module
{

    private $errorList=[];

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\subscribers\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }

    /**
     * @param $user_sub_id // пользователь на кого подписан (берем ид странички где находимся)
     * @param $current_user_id  // текуший пользователь
     * @return bool
     */
    public function isSubscriber($user_sub_id, $current_user_id){


     $user_owm = User::find()->where(['id'=>$user_sub_id])->one();
     $current_user = User::find()->where(['id'=>$current_user_id])->one();

     if($user_owm && $current_user ){
//         'user_own_id', 'user_sub_id'
         Yii::error(['qwert',$user_sub_id, $current_user_id]);
      //   $subscriber=Subscriber::find()->where(['user_sub_id'=>(integer)$user_sub_id,'user_own_id'=>$current_user_id])->one();
         $subscriber=Subscriber::find()->where(['user_sub_id'=>$current_user_id,'user_own_id'=>$user_sub_id])->one();

         if($subscriber){

             return true;
         }
     }
        return false;

    }

    public function addSubscriber($user_sub_id,$period)
    {
//         'user_own_id', 'user_sub_id'
        $subscriber=Subscriber::find()->where(['user_own_id'=>Yii::$app->user->id,'user_sub_id'=>$user_sub_id])->one();
        if(!$subscriber){
            $subscriber=  new Subscriber();
            $subscriber->created_at=date('Y-m-d H:i:s');
        }

//            'user_own_id' => 'ид пользователя',
//            'user_sub_id' => 'ид подписчика',
//            'expired_at' => 'время окончания',
//            'status' => 'статус блокирован активен прострочено время ...',
//            'created_at' => 'создан',


        $expired_at=  $new_time = date("Y-m-d H:i:s", strtotime("+".$period));
        $parar=['user_own_id'=>Yii::$app->user->id,'user_sub_id'=>$user_sub_id,'status'=>1,'expired_at'=>$expired_at];
        $subscriber->attributes=$parar;
        if($subscriber->validate()){
            $subscriber->save();
            return true;
        }else{
          //  throw new  ErrorException(print_r($subscriber->errors,true));
            Yii::error($subscriber->errors);
        }

        return true;
    }



    public function removeSubscriber($user_sub_id)
    {
//         'user_own_id', 'user_sub_id'
        $subscriber=Subscriber::find()->where(['user_own_id'=>Yii::$app->user->id,'user_sub_id'=>$user_sub_id])->one();
        if($subscriber){
            if($subscriber->delete()){
     //    можно еще что-то делать тима уведомления и тд..
                return true;
            }else{
                throw new ErrorException('Errorr delete Subscriber');
            }

        }

    }


    // набор валидаций для добавления подписчика
    public function prevalidate()
    {
        if(empty(Yii::$app->request->post("Subscriber")['id'])) $this->errorList[]=['empty Subscriber id'];
        if(empty(Yii::$app->request->post("Subscriber")['period'])) $this->errorList[]=['empty Period'];
        if(!empty(Yii::$app->request->post("Subscriber")['period'])){
                  //  var_dump(Yii::$app->request->post("Subscriber")['period']);
//            $this->errorList[]['empty Subscriber id'];
        }
        if(empty(Yii::$app->user->id))                                 $this->errorList[]=['empty Current user id'];

        if(empty($this->errorList)){
            return true;
        }
        return false;
    }


    // набор валидаций для удаления подписчика
    public function prevalidateRemoveSubscriber()
    {
        if(empty(Yii::$app->request->post("Subscriber")['id'])) $this->errorList[]=['empty Subscriber id'];

        if(empty(Yii::$app->user->id))                                 $this->errorList[]=['empty Current user id'];

        if(empty($this->errorList)){
            return true;
        }
        return false;
    }



    /**
     * @return array
     */
    public function getErrorList()
    {
        return $this->errorList;
    }



}


