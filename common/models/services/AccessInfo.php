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

        $accessInfoAccount=new  AccessInfoAccount(($getCountOpenMe+$getCountOpenForMe),
            $this->user->getCountSubscriberMail(),
            $this->user->getCountSubscribersMail(),
            $this->user->getCountWagers(),555,666);
        return $accessInfoAccount;
    }



}
