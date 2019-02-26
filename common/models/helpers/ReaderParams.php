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
        if(isset($this->post['CartElements'])){
            foreach ($this->post['CartElements'] as $cE) {

                $this->bets[]=$cE['CartElement'];
            }
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


    /**
     * для ставок из парсер
     * @return array
     */
    public function getBetelements()
    {
        if(count($this->bets) > 1) return $this->getMultiBet();
        else  return $this->getSingleBet();
    }

    /**
     * для ставок локального отображение
     * @return array
     */
    public function getLocalBetelements()
    {
         return $this->bets;
    }


    private function getSingleBet()
    {

       $b = $this->bets[0];
//       var_dump($b['coef']); die();
        $valueArr=  explode('-',$b['item_id']);
    // sport_id=valueArr[2]
    $event_id=$valueArr[1];
    $market_id=$valueArr[2];
    $game_id=$valueArr[0];

    $base=$valueArr[3]; // invariant
    $base=$this->getBaseInvariant($b['item_id']); // invariant

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


    /**
     * подсчет инванианта базового для ставко тип  точный счет 4 - 3
     * @param $item_id
     */
    private function getBaseInvariant($item_id)
    {
        $valueArr=  explode('-',$item_id);

        $findme   = ' - ';
        $pos = strpos($item_id, $findme);

        if ($pos !== false) {

            $valueArrNoSpace=   str_replace(' ','',$item_id);
            $valueArrNew=  explode('-',$valueArrNoSpace);
            $base=sprintf('%s - %s',$valueArrNew[3],$valueArrNew[4]);

             return $base;


            // todo для минусовой форы тоже нужно обработчик
        } else {
            return $valueArr[3];
        }


    }

    private function getMultiBet()
    {

        $res=[];
        foreach ($this->bets as $bet) {
            $b = $bet;
//       var_dump($b['coef']); die();
            $valueArr=  explode('-',$b['item_id']);
            // sport_id=valueArr[2]
            $event_id=$valueArr[1];
            $market_id=$valueArr[2];
            $game_id=$valueArr[0];
            $base=$valueArr[3]; // invariant
            $base=$this->getBaseInvariant($b['item_id']); // invariant
            $dataParser=$this->getInfoAboutGame($game_id);


            $res[]=[
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
                "overtime"=> $dataParser->attributes->{'overtime'},
                'full_id'=>$b['item_id']
                ,];

        }



        //  var_dump($dataParser->attributes->{'short-id'}); die();



        return $res;

    }


    /**
     * тип ставки  Single Multiple  or some else для мультиствок нужно доделать
     * @return string
     */
    public function getTypeBet()
    {
//        $type = 'Single';
//        $type = 'Multiple';
        if(count($this->bets) > 1)   return  'Multiple';
        else return 'Single';

    }


    /**
     * разбор поста и генерация ссылки для обновы одиночной ствавки
     * испольуюетя только в обнове корзины
     * @return string http://104.248.229.40/?getEventResolveInfo/233861820/12342/7/-2.5/en/j_zaxscdvfq1w2e3r4
     */
    public function getUrlSingleUpdate()
    {
        $urle=ConstantsHelper::PARSE_BASE_URL.ConstantsHelper::PARSE_SINGLE_BET; //     // обновка корзины /?getEventResolveInfo/%s/%s/%s/%s/en/j_zaxscdvfq1w2e3r4';
                                                                                        // http://104.248.229.40/?getEventResolveInfo/233861820/12342/7/-2.5/en/j_zaxscdvfq1w2e3r4
       // $this->post['id']='233861820-7-12342--2.5';
        $ex=explode('-',$this->post['id']);
        if(stristr($this->post['id'], '--') !== FALSE) { // c минусом    $this->post['id']='233861820-7-12342--2.5';
            $res= sprintf($urle,$ex[0],$ex[2],$ex[1],'-'.$ex[4]);
        }else{
            $res= sprintf($urle,$ex[0],$ex[2],$ex[1],$ex[3]);
        }
        return  $res;
    }

}
