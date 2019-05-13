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
      $this->user=User::find()->where(['id'=>$u_id])->one();
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
    public function getWeekNum($baseUserId)
    {
    //    return 23;
        $lastWeek    = date('Y-m-d H:i:s');
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday'));
        $sql="SELECT user_id, sum(profit) as sume FROM `balancestatistics` WHERE  created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC;";
              $numberWeek=0;
              foreach (Yii::$app->db->createCommand($sql)->queryAll() as $i=>$el){
                         if($el['user_id']==$baseUserId)  {$numberWeek=$i; $numberWeek++; break; }
                     }

                     return $numberWeek;
//            return 23;
    }

    /**
     * профит за нелелю
     */
    public function getWeekProfit($baseUserId)
    {

        $lastWeek    = date('Y-m-d H:i:s');
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('last sunday'));
        $sql="SELECT  sum(profit) as sume FROM `balancestatistics` WHERE  created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' and user_id = {$baseUserId} ;";
         $numberWeek=Yii::$app->db->createCommand($sql)->queryScalar();
         if(empty($numberWeek)) $numberWeek=0;
       return $numberWeek;


    }


    /**
     * номер в турнире за Top100
     */
    public function getTop100($baseUserId)
    {
        $lastLastWeek= date('Y-m-d H:i:s',strtotime('-90 days'));
        $lastWeek    = date('Y-m-d H:i:s');
        $sql="SELECT user_id, sum(profit) as sume FROM `balancestatistics` WHERE  created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC;";
        $numberWeek=0;
        foreach (Yii::$app->db->createCommand($sql)->queryAll() as $i=>$el){
            if($el['user_id']==$baseUserId)  {$numberWeek=$i; $numberWeek++; break; }
        }
        return $numberWeek;

    }



}
