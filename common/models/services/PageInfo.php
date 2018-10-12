<?php

namespace common\models\services;

use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

class PageInfo
{
   const PERIOD_ONE_MONTH=1;
   const PERIOD_THREE_MONTH=3;
   const PERIOD_ALL_MONTH=0;


    const PLAYLIST_NOT_SELECTED=0;

   private $play_period;// период игр 1 3 весь период
   private $play_period_playlist;// период игр плейлист

  public function __construct()
  {
        $this->play_period=$this->setPalyPeriod();
        $this->play_period_playlist=$this->setPlayPeriodPlaylist();
  }




    private function setPlayPeriodPlaylist()
    {
        $play_period_playlist=Yii::$app->request->get('playlist');
        if(empty($play_period_playlist)){
            return self::PLAYLIST_NOT_SELECTED;
        }
        return  (int)$play_period_playlist;

    }

    private function setPalyPeriod(){
        $period=Yii::$app->request->get('play-period');
        if($period=="3"){
             return self::PERIOD_THREE_MONTH;
        }elseif($period=="1"){
            return self::PERIOD_ONE_MONTH;
        }else{
            return self::PERIOD_ALL_MONTH;
        }

    }

    public function getPlayPeriod()
    {
        return $this->play_period;
    }

    /**
     * @return int
     */
    public function getPlayPeriodPlaylist()
    {
        return $this->play_period_playlist;
    }


}
