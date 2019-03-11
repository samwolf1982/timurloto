<?php

namespace console\controllers;

use common\models\Balancestatistics;
use Yii;
use yii\console\Controller;
/**
 *cлучайные значения  balancestatistics,
 */
class TestController extends Controller {


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