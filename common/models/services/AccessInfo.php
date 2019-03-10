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

    public function __construct($u_id)
    {
      $this->user=User::find()->where(['id'=>$u_id])->one();


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
    public function getWeekNum()
    {
    //    return 23;
        $lastWeek    = date('Y-m-d h:i:s');
        $lastLastWeek= date('Y-m-d h:i:s',strtotime('last sunday'));
        $sql="SELECT user_id, sum(profit) as sume FROM `balancestatistics` WHERE  created_own BETWEEN '{$lastLastWeek}' AND '{$lastWeek}' GROUP BY user_id ORDER BY sume DESC;";
        $names = Yii::$app->db->createCommand($sql)->queryAll();
              $numberWeek=0;
              foreach (Yii::$app->db->createCommand($sql)->queryAll() as $i=>$el){
                         Yii::error($el['user_id']);
                         if($el['user_id']==$this->user)  {$numberWeek=$i; $numberWeek++; break; }
                     }

                     return $numberWeek;
//            return 23;
    }



}
