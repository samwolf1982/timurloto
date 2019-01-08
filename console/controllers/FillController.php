<?php

namespace console\controllers;

use common\models\Balancestatistics;
use Yii;
use yii\console\Controller;
/**
 *cлучайные значения  balancestatistics,
 */
class FillController extends Controller {


    // cлучайные значения для  balancestatistics для проверки профита
    public function actionBstst() {


        foreach (Balancestatistics::find()->where(['user_id'=>44])->all() as $item) {
                  $item->delete();
        }

        foreach (range(10,500) as $item) {
         $b=   new Balancestatistics();
         $attr=[        'user_id' => 44,
             'wager_id' => rand(1,100000),
             'playlist_id' => rand(1,10),
             'event_id' => rand(1,100000),
             'profit' => rand(-20,30),
             'penetration' => 1,
             'middle_coef' => 1,
             'roi' => 1,
             'plus' => 1,
             'minus' => 0,
             'created_at' => date('Y-m-d h:i:s', strtotime( '+'.mt_rand(0,400).' days')),
             'created_own'=> date('Y-m-d h:i:s', strtotime( '+'.mt_rand(0,400).' days')),];

            $b->attributes=$attr;
            $b->save();
                }


        echo 'fin'.PHP_EOL;
    }
}