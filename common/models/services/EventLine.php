<?php

namespace common\models\services;

use common\models\Bets;
use common\models\Eventsnames;
use common\models\helpers\ConstantsHelper;
use common\models\wraps\EventsnamesExt;
use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use dektrium\user\models\User;
use yii\helpers\Url;

class EventLine
{

    private $event_id;

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->event_id;
    }
    private $outcomes;
    private $groupedOutcomes;
    private $eventNameObj;
    private $eventName;
    private $tournamentName;

    /**
     * @return mixed
     */
    public function getTournamentName()
    {
        return $this->tournamentName;
    }

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Line constructor.
     * @param $event_pid
     */
    public function __construct($event_id)
    {
        $this->event_id = $event_id;
        $this->groupedOutcomes=[];
        $b=Bets::find()->where(['event_id'=>$this->event_id])->all();
        $tmp_groupedOutcomes=[];
        foreach ($b as $item) {
            $tmp_groupedOutcomes[$item->market_name][]=$item;
//            $this->groupedOutcomes[$item->market_name][]=$item;
        }
        foreach ($tmp_groupedOutcomes as $k => $groupedOutcome) {
            foreach ($groupedOutcome as $item_3) {
//                print_r([$k,$item_3->result_type_name,$item_3,123]); echo PHP_EOL;
                $this->groupedOutcomes[$k][$item_3->result_type_name]=$item_3;
            }

        }


        $this->eventNameObj=Eventsnames::find()->where(['event_id'=>$this->event_id])->one();
        if($this->eventNameObj){
            $this->eventName=$this->eventNameObj->event_name;
            $this->tournamentName=$this->eventNameObj->tournament_name;
        }
    }


    public function getLine()
    {
        return $this->groupedOutcomes;
    }

    public function getCountGroupInLine()
    {
        return count( $this->groupedOutcomes);
    }





}
