<?php

namespace common\models\services;

use common\models\Bets;
use common\models\DTO\AccessInfoAccount;
use common\models\Eventsnames;
use common\models\helpers\ConstantsHelper;
use common\models\User;
use common\models\wraps\EventsnamesExt;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class AccessInfo
{


    private $u_id;
    private $user;
//    private $params;
//    private $period; //период из запросоа stat-period stat-period=week  month  3-month year

    public function __construct($u_id)
    {
//      $this->user=User::find()->where(['id'=>$u_id])->one();
      $this->user=User::find()->where(['id'=>$u_id])->cache(ConstantsHelper::USER_FIND_CACHE_TIME)->one();
//      $this->params=$params;
//      $this->period=$this->setPeriodfield($params);
//        yii::error($this->period);
    }




    public function getData()
    {
//        $countTotalOpenAccess, $countSubscribe, $countSubscribers, $countWagers, $weekNum, $top100
    $getCountOpenMe=$this->user->getCountOpenMe($this->user->id);
    $getCountOpenForMe=$this->user->getCountOpenedForMe($this->user->id);

//    Yii::error([$getCountOpenMe,$getCountOpenForMe]);
        $accessInfoAccount=new  AccessInfoAccount(($getCountOpenMe+$getCountOpenForMe),
            $this->user->getCountSubscriberMail(),
            $this->user->getCountSubscribersMail(),
            $this->user->getCountWagers(),555,666);
        return $accessInfoAccount;
    }


    /**
     * номер в турнире за неделю
     */
    public function getWeekNum($baseUserId,$params=[])
    {
    //    return 23;
        $lastWeek    = date('Y-m-d H:i:s');
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday'));
        if(date('w')==='1')  $lastLastWeek= date("Y-m-d 00:00:00"); // если понедельник тогда берем текущий день с 00:00:00


        if(isset($params['dtop'])){
            $lastWeek = $params['dtop'];
            $lastLastWeek =  date('Y-m-d H:i:s', (strtotime($params['dtop']) - 7*24*60*60) );
        }
//

        // todo cache add here

        $sql="SELECT user_id, sum(profit) as sume FROM `balancestatistics` INNER JOIN `user` ON balancestatistics.user_id = user.id WHERE  balancestatistics.created_at BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC;";
              $numberWeek=0;
              foreach (Yii::$app->db->createCommand($sql)->queryAll() as $i=>$el){
                         if($el['user_id']==$baseUserId)  {$numberWeek=$i; $numberWeek++; break; }
                     }
                     return $numberWeek;
    }

    /**
     * номер в Рейтинге  низ таб за месяц
     */
    public function getRaitNum($baseUserId,$params=[])
    {
//        $lastWeek    = date('Y-m-d H:i:s',strtotime('last monday'));
//        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday -7 days'));
        $offcet_time='-31 days';
        $lastWeek    = date('Y-m-d H:i:s');
        if(!empty($params['period']) and  ($params['period']==ConstantsHelper::PERIOD_3_M or $params['period']==ConstantsHelper::PERIOD_ALL) ){
            if($params['period']==ConstantsHelper::PERIOD_3_M){
                $offcet_time='-93 days';
            }elseif ($params['period']==ConstantsHelper::PERIOD_ALL) {
                $offcet_time='-36000 days';
            }
        }
        $lastLastWeek= date('Y-m-d H:i:s',strtotime($offcet_time));

        ////////////////
        //    return 23;
      //  $lastWeek    = date('Y-m-d H:i:s');
        //$lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday'));
       // if(date('w')==='1')  $lastLastWeek= date("Y-m-d 00:00:00"); // если понедельник тогда берем текущий день с 00:00:00


//        if(isset($params['dtop'])){
//            $lastWeek = $params['dtop'];
//            $lastLastWeek =  date('Y-m-d H:i:s', (strtotime($params['dtop']) - 7*24*60*60) );
//        }
//
        // todo cache add here
        //SELECT user_id, sum(profit) as sume FROM `balancestatistics` INNER JOIN `user` ON balancestatistics.user_id = user.id WHERE  balancestatistics.created_at BETWEEN '2019-04-24 18:56:44' AND '2019-05-25 18:56:44' GROUP BY user_id ORDER BY sume DESC;
        $sql="SELECT user_id, sum(profit) as sume FROM `balancestatistics`  INNER JOIN `user` ON balancestatistics.user_id = user.id WHERE  balancestatistics.created_at BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC;";
//        var_dump($sql); die();
        $numberWeek=0;
        foreach (Yii::$app->db->createCommand($sql)->queryAll() as $i=>$el){
            if($el['user_id']==$baseUserId)  {$numberWeek=$i; $numberWeek++; break; }
        }

      //  var_dump($numberWeek); die();
        return $numberWeek;
    }



    /**
     * профит за нелелю
     */
    public  function getWeekProfit($baseUserId)
    {

        $lastWeek    = date('Y-m-d H:i:s');
      //  $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday + 1 day')); // бы

        if(0){
            if('Mon' != date('D')) $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday'));
            else $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday + 1 day')); // бы
        }


        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last monday'));
        if(date('w')==='1')  $lastLastWeek= date("Y-m-d 00:00:00"); // если понедельник тогда берем текущий день с 00:00:00
        $userId=$this->user->id;
      //  $sql="SELECT  sum(profit) as sume FROM `balancestatistics` WHERE  created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' and user_id = {$userId} ;";
        $sql="SELECT  sum(profit) as sume FROM `balancestatistics` WHERE  created_at BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' and user_id = {$userId} ;";

      //  var_dump($sql); die();     //SELECT  sum(profit) as sume FROM `balancestatistics` WHERE  created_own BETWEEN '2019-05-20 00:00:00' AND '2019-05-20 09:41:24' and user_id = 187 ;
        $numberWeek=Yii::$app->db->createCommand($sql)->queryScalar();
         if(empty($numberWeek)) $numberWeek=0;
        return  round( $numberWeek,2)  ;

//        $sql1="select COUNT(subquery.user_id) FROM
//( SELECT user_id, sum(profit) as sume, created_own  FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume) AS subquery  WHERE 1";
//        $count=Yii::$app->db->createCommand($sql1,[':status' => 1])->queryScalar();
//        $sql2= "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro, created_own
//                        FROM `balancestatistics`  WHERE created_at BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ";
//
//        $sql2= "SELECT user_id, sum(profit) as sume, (SUM(`penetration`)/ COUNT(`penetration`)*100) as penet, ( SUM(`middle_coef`) / COUNT(`middle_coef`))    as mdc, (SUM(`roi`) / COUNT(`roi`)) as ro, created_own
//                        FROM `balancestatistics`  WHERE created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC ";

    }


    /**
     * номер в турнире за Top100
     */
    public function getTop100($baseUserId)
    {
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('-90 days'));
        $lastWeek    = date('Y-m-d H:i:s');
        $sql="SELECT user_id, sum(profit) as sume FROM `balancestatistics` WHERE  created_at BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC;";
        $numberWeek=0;
        foreach (Yii::$app->db->createCommand($sql)->queryAll() as $i=>$el){
            if($el['user_id']==$baseUserId)  {$numberWeek=$i; $numberWeek++; break; }
        }
        return $numberWeek;

    }



}
