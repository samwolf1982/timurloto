<?php

namespace console\controllers;

use common\models\Wager;
use frontend\modules\wager\models\WagerManager;
use common\models\Balancestatistics;
use common\models\DTO\WagerInfo;
use Yii;
use yii\console\Controller;
/**
 *cлучайные значения  balancestatistics,
 */
class TestController extends Controller {


    /**
     *
     * тест для просчета коректности ставок
     */
    public function actionCalculate()
    {
        echo 'Start'.PHP_EOL;
        $userList=[65,66,67];

        $sumBet=100;
        $coefficient=6;
        $open_close=false;
        $beginId=777777999;
        foreach ($userList as $u_id) {
            // UPDATE `balance_score` SET `balance`=100000 WHERE `user_id`=65;
    // баланс для начала цикла  100000
//            Yii::$app->db->createCommand()
             Yii::$app->db->createCommand("UPDATE `balance_score` SET `balance`=100000 WHERE `user_id`={$u_id}")->execute();


             $data=[
                 [
                     'sport-name_ru' => 'test_Футбол',
                     'league-name_ru' => 'test_Лига Чемпионов УЕФА',
                     'team-1-name_ru' => 'test_Бавария',
                     'team-2-name_ru' => 'test_Ливерпуль',
                     'country-name_ru' => 'test_Европа',
                     'market-name_ru' => 'test_1x2',
                     'event-name_ru' => 'test_П1',
                     'additional_game_name_ru' => null,
                     'sport-name_en' => 'test_Football',
                     'league-name_en' => 'test_UEFA Champions League',
                     'team-1-name_en' => 'test_Bayern Munich',
                     'team-2-name_en' => 'test_Liverpool',
                     'country-name_en' => 'test_Europe',
                     'market-name_en' => 'test_1x2  ',
                     'event-name_en' => 'test_W Bayern Munich',
                     'additional_game_name_en' => null,
                     'odd' => 6, // or 3*2
                     'status' => 'success',
                 ],
             ];
             $time_list=[    [
                 'id' => $beginId,
                 'start' => '1452507200',
             ],];


             $post=['CartElements'=>[

                 0 => [
                     'CartElement' => [
              'group_item_id' => '238347309',
            'item_id' => $beginId.'-1-12341-0',
            'gamersName' => 'Бавария - Ливерпуль',
            'name' => 'П1',
            'mname' => '1x2',
            'status' => 'true',
            'coef' => 6,
        ]
                ]]
             ];


            $tdo_Wager_user_info = new WagerInfo($u_id, null, 'comment blablaba', $sumBet, 2, $open_close,$data,(object)$time_list);
            $vagerManager = new WagerManager($post, $tdo_Wager_user_info);
           $wager_id= $vagerManager->add();
           $w=Wager::find()->where(['id'=>$wager_id])->one();
           $w->status=Wager::STATUS_MANUAL_BET;
           $w->save(false);
           echo 'wager_id:  '.$wager_id.PHP_EOL;
          //  $result=  WagerManager::makeBet($u_id,Yii::$app->request->post(),$sumBet);



            $statusManager=new StatusManager($model,Wager::STATUS_ENTERED);
            $statusManager->recalculateStatus();







            foreach ($w->wagerelements as $we) {
                $we->delete(false);
            }
            $w->delete(false);




            break;
        }


        echo 'End'.PHP_EOL;
    }

    public function actionLastWeek() {


        $lastWeek    = date('Y-m-d H:i:s',strtotime('last sunday'));
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday -7 days'));
        $sqlWeek= "select COUNT(subquery.user_id) FROM
( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatisticslarge`  WHERE created_own BETWEEN '{$lastWeek}' AND '{$lastLastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1";



        echo $sqlWeek.PHP_EOL;

//        $count=Yii::$app->db->createCommand("select COUNT(subquery.user_id) FROM
//( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatisticslarge`  WHERE created_own BETWEEN '{$lastWeek}' AND '{$lastLastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1",[':status' => 1])->queryScalar();


        echo date('Y-m-d',strtotime('last sunday')).PHP_EOL;

echo date('Y-m-d',strtotime('last sunday -7 days')).PHP_EOL;
        echo 'fin'.PHP_EOL;

    }
}