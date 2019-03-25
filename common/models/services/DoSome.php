<?php

namespace common\models\services;

use common\models\helpers\ConstantsHelper;
//use dektrium\user\models\User;
use common\models\overiden\User;
use komer45\balance\models\Score;
use komer45\balance\models\Transaction;
use Yii;
use yii\helpers\Url;

// всякие действия что делаются в разных местах и не групируются по типу
// куча static function
class DoSome
{


    /**
     * ссздавание баланса для пользователя
     * @param $user_id
     */
    public static function createBalance($user_id)
    {
        $balanceId=null;
        $findUser = Score::find()->where(['user_id' => $user_id])->one();
        if (!$findUser){
            $userBalance = new Score;
            $userBalance->user_id = $user_id;
            //  $userBalance->balance = ConstantsHelper::DEFAULT_USER_CREATE_BALANCE;
            $userBalance->balance = 0;
            if($userBalance->validate()){
                $userBalance->save();
                // ставка добавлена  снятие баланса
                $modelTransaction = new Transaction();
//            'balance_id' => $this->integer(11)->notNull(), 'date' => $this->datetime()->null()->defaultValue(null), 'type' => "ENUM('in', 'out') NOT NULL", 'amount' => $this->decimal(12, 2)->notNull(), 'balance' => $this->decimal(12, 2)->notNull(), 'user_id'=> $this->integer(11)->notNull(), 'refill_type' => $this->string(255)->notNull(), 'canceled' => $this->datetime()->null()->defaultValue(null), 'comment' => $this->string(255)->null()->defaultValue(null),
                $param=['type'=>'in','amount'=>ConstantsHelper::DEFAULT_USER_CREATE_BALANCE,'balance_id'=>$userBalance->id,'refill_type'=>'first transaction, add default'];
                $modelTransaction->attributes=$param;
                if($modelTransaction->validate()){
                    $addTransaction = Yii::$app->balance->addTransaction($modelTransaction->balance_id, $modelTransaction->type, $modelTransaction->amount, $modelTransaction->refill_type);
                    $balanceId=  $userBalance->id;
                }else{
                    yii::error($modelTransaction->errors);
                }

            } else{
                var_dump($userBalance->errors);
                die('Uh-oh, somethings went wrong!');
            }
        }
        return $balanceId;
    }

}
