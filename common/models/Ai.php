<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 11.08.2018
 * Time: 6:04
 */

namespace common\models;


use komer45\balance\models\Score;
use Yii;

class Ai
{

    /**
     * добавить ставку от зареганого пользователя и списание баланса
     */
    public function addBet(){
        $findUser = Score::find()->where(['user_id' => Yii::$app->user->id])->one();
        $sum=Yii::$app->request->post('sum');
        if ($findUser){
            $findUser->balance -= $sum;
            if($findUser->validate()){
                $findUser->save();
            } else die('Uh-oh, somethings went wrong!');
        }
        $b= Score::find()->where(['user_id' => Yii::$app->user->id])->one()->balance;
        $balance  = number_format($b, 0, '', ',');
        $hash=Yii::$app->request->post('hash');
        return ['balance'=>$balance,'message'=>'Ставка успешно добавлена','hash'=>$hash];

    }

}