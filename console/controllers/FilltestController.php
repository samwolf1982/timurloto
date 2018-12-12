<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace console\controllers;


use common\models\Bets;
use common\models\Eventsnames;
use common\models\helpers\ConstantsHelper;
use common\models\Sportcategory;
use common\models\Sportcategorynames;
use common\models\Tournamentsnames;
use common\test\models\Balancestatisticslarge;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 * порядок запуска  actionCategorynames,    actionTournamentsnames-> с таймером     actionEventsnames   actionGamesnames(+-1500)  actionBetsloops (очень много) -> с таймером
 *
 * для парсеров наверно менять условие парсинга по полю статус если есть наверно поле tournament_is_summaries ???
 *
 */
class FilltestController extends Controller
{



    /**
     * тестовое заполнение для betstatistics     500 000
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionFillBet($message = 'hello world')
    {

       //new    Balancestatisticslarge();


        foreach (range(1,2000) as $itm) {

            $data = array();
            foreach(range(1,100) as $key=>$value){
                $year= random_int(2017,2022);
                $mounth=random_int(1,9);
                $day1= random_int(10,25);
                $day2= $day1;
                $day2+=5;

                // delete
//                $year=2018;
//                $mounth=12;
//                $day1= random_int(1,4);
//                $day2= $day1;
//                $day2+=5;
                // delete

                // $year= random_int(2017,2022);
                $data[] = [random_int(100,10000),10,10, 500,rand(-25,45),1,1,1,1,0,"{$year}-0{$mounth}-{$day1} 01:19:58","{$year}-0{$mounth}-{$day2} 01:19:58"];
               // var_dump([random_int(100,10000),10,10, 500,rand(-25,45),1,1,1,1,0,"{$year}-{$mounth}-0{$day1} 01:19:58","{$year}-{$mounth}-0{$day2} 01:19:58"]); die();
               // $data[] = [random_int(100,10000),10,10, 500,rand(-25,45),1,1,1,1,0,"{$year}-{$mounth}-0{$day1} 01:19:58","{$year}-{$mounth}-0{$day2} 01:19:58"];
            }

//        SELECT id, sum(profit) as sume FROM `balancestatistics`  WHERE 1 GROUP BY user_id ORDER BY sume DESC;
// , `user_id`, `wager_id`, `playlist_id`, `event_id`, `profit`, `penetration`, `middle_coef`, `roi`, `plus`, `minus`, `created_at`, `created_own`
            Yii::$app->db
                ->createCommand()
                ->batchInsert('balancestatisticslarge', ['user_id', 'wager_id', 'playlist_id', 'event_id', 'profit', 'penetration', 'middle_coef', 'roi', 'plus', 'minus', 'created_at', 'created_own'],$data)
                ->execute();


            echo $itm.PHP_EOL;
        }





        echo $message . "\n";

        return ExitCode::OK;
    }

}
