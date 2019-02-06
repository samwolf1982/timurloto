<?php

namespace common\models\helpers;

use common\models\ParserNodeDos;

class ReaderParams extends \yii\base\BaseObject
{
    private $post;
    private $bets;


    
    public function __construct($post)
    {
         $this->post=$post;
         $this->loade();
    }

    private function loade()
    {
        $this->bets=[];
        foreach ($this->post['CartElements'] as $cE) {

            $this->bets[]=$cE['CartElement'];
        }
    }


    private function getMarket_id()
    {

    }

    private function getInfoAboutGame($gameId)
    {
        $dos=new ParserNodeDos();
        $data= $dos->getEventsByGameId($gameId);
        return $data['attr'][0];  //


    }


    public function getSingleBet()
    {

       $b = $this->bets[0];
//       var_dump($b['coef']); die();
        $valueArr=  explode('-',$b['item_id']);
    // sport_id=valueArr[2]
    $event_id=$valueArr[1];
    $market_id=$valueArr[2];
    $game_id=$valueArr[0];
    $base=$valueArr[3]; // invariant

      $dataParser=$this->getInfoAboutGame($game_id);
      //  var_dump($dataParser->attributes->{'short-id'}); die();

        $res= [
        "market_id"=> $market_id,
        "event_id"=> $event_id,
        "sport_id"=> $dataParser->attributes->{'sport-id'},
        "league_id"=>$dataParser->attributes->{'league-id'} ,
        "country_id"=>$dataParser->attributes->{'country-id'},
        "country_code"=>$dataParser->attributes->{'country-code'},
        "start_result"=> "-",
        "game_id"=> $game_id,
        // game_short_id: 7004, //need to paste real value or
        // game_short_id: 40391, //need to paste real value
        "game_short_id" =>$dataParser->attributes->{'short-id'} , //need to paste real value
        "base"=> $base,
        "odd" => $b['coef'],
        // val:val,
        //    start: 1547369100, //unix timestamp
        //  start: 1550001600, //unix timestamp
        "start"=> $dataParser->attributes->{'start'}, //unix timestamp
        //  type: "live", //все live
        "type"=> "line",
        "is_main_game"=> true,
        "overtime"=> $dataParser->attributes->{'overtime'}
        ,];

        return $res;

    }
    
}
