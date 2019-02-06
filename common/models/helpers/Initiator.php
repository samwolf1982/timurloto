<?php

namespace common\models\helpers;

class Initiator extends \yii\base\BaseObject
{
    public $baseUrl;
    public $partsUrl=[];
    public $params;

    public $lastUrl;


    /**
     * Initiator constructor.
     * @param $baseUrl
     */
    public function __construct()
    {
//         $this->baseUrl=ConstantsHelper::PARSE_BASE_DOCUMENTATION_URL;
         $this->baseUrl=ConstantsHelper::PARSE_BASE_URL;
    }


    private function setSportType()
    {
        $this->partsUrl=[];
        $this->partsUrl[]=ConstantsHelper::PARSE_SPORT_TYPE_URL_PARTS;
    }
    private function setTourneyType($tourneyId)
    {
        $this->partsUrl=[];
        $this->partsUrl[]= sprintf(ConstantsHelper::PARSE_TOURNEY_TYPE_URL_PARTS,$tourneyId);
    }
    private function setTourneyGameType($tourneyId)
    {
        $this->partsUrl=[];
        $this->partsUrl[]= sprintf(ConstantsHelper::PARSE_GAMES_IN_TOURNEY_URL_PARTS,$tourneyId);
    }
    private function setEventsType($gameId)
    {
        $this->partsUrl=[];
        $this->partsUrl[]= sprintf(ConstantsHelper::PARSE_EVENT_BY_ID_URL_PARTS,$gameId);
    }




    public function getSportTypeUrl()
    {
        $this->setSportType();
        return $this->generateUrl();
    }

    public function getTourneyTypeUrl($tourneyId)
    {
        $this->setTourneyType($tourneyId);
        return $this->generateUrl();
    }
    public function getTourneyGamesTypeUrl($tourneyId)
    {
        $this->setTourneyGameType($tourneyId);
        return $this->generateUrl();
    }


    public function getEventsTypeUrl($tourneyId)
    {
        $this->setEventsType($tourneyId);
        return $this->generateUrl();
    }










    private function generateUrl()
    {
         $url=$this->baseUrl;
         if(!empty($this->partsUrl)){
             foreach ($this->partsUrl as $part){
                 $url.='/'.$part;
             }
         }
         $this->lastUrl=$url;// для удобства в проверке на фронте
         return $url;
    }

}
