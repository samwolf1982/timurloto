<?php

namespace common\models;


use common\models\helpers\ConstantsHelper;
use common\models\helpers\Initiator;
use common\models\DTO\CompetitionS3;
use common\models\DTO\GameS3;
use GuzzleHttp\Client;
use Yii;
use yii\base\ErrorException;


class ParserNodeDos extends \yii\base\BaseObject
{
   private  $initiator;

    /**
     * Dos constructor.
     */
    public function __construct()
    {
         $this->initiator=new Initiator();
    }


    public function getSportType()
    {
        $data= $this->parse($this->initiator->getSportTypeUrl());
        $res=[];
        foreach ($data->data as $datum) {
            $res[]=['id'=>$datum->id,'name'=>$datum->attributes->{'user-locale-lng-name'},'count'=>$datum->attributes->{'count'}];
        //  echo      sprintf('id) %s count) %s name) %s',$datum->id,$datum->attributes->{'count'},$datum->attributes->{'user-locale-lng-name'}).PHP_EOL;

//            var_dump($datum->id);
//            var_dump($datum->attributes->{'count'});
//            var_export($datum->attributes->{'user-locale-lng-name'});
        }
        return $res;

    }

    public function getTourney($tourneyId)
    {
        $data= $this->parse($this->initiator->getTourneyTypeUrl($tourneyId));
        $res=[];
//        var_dump($data); die();
        foreach ($data as $datum_L1) {
            foreach ($datum_L1 as $datum){
               // var_dump($datum); die();
                $res[]=['id'=>$datum->{'league-id'},'name'=>$datum->{'league-name'},'count'=>$datum->{'games-count'}];
            }

            //  echo      sprintf('id) %s count) %s name) %s',$datum->id,$datum->attributes->{'count'},$datum->attributes->{'user-locale-lng-name'}).PHP_EOL;
//            var_dump($datum->id);
//            var_dump($datum->attributes->{'count'});
//            var_export($datum->attributes->{'user-locale-lng-name'});
        }
        return $res;

    }
    public function getTourneyGames($tourneyId)
    {
        $data= $this->parse($this->initiator->getTourneyGamesTypeUrl($tourneyId)); //http://157.230.134.85:8081/lineSport/131927/ru/j_zaxscdvfq1w2e3r4
        $res=[];
        //   var_dump($data); die();
        $gameCollector=[];


        $completition=[];
        foreach ($data->included as $datum) {
            if($datum->type=='competition'){
                $completition[]=1;
               // var_dump($datum); die();
            }else if($datum->type=='game'){

                    $gameCollector[]=$datum->attributes;
            }else if($datum->type=='event'){

            }else{
                var_dump($datum->type);
               die('not  $datum->type==\'competition\' or not  $datum->type==\'game\' or not $datum->type==\'event\' ' );
            }
           // $res[]=['id'=>$datum->{'league-id'},'name'=>$datum->{'league-name'},'count'=>$datum->{'games-count'}];
            //  echo      sprintf('id) %s count) %s name) %s',$datum->id,$datum->attributes->{'count'},$datum->attributes->{'user-locale-lng-name'}).PHP_EOL;
//            var_dump($datum->id);
//            var_dump($datum->attributes->{'count'});
//            var_export($datum->attributes->{'user-locale-lng-name'});
        }

        foreach ($gameCollector as $item) {
            $res[]=['id'=>$item->{'main-game-id'},'name'=>($item->{'team-1-user-locale-lng-name'}.' - '.$item->{'team-2-user-locale-lng-name'} ),'count'=>$item->{'event-count'}];
        }
        return $res;

    }


    public function getEventsByGameId($gameId)
    {

        $data= $this->parse($this->initiator->getEventsTypeUrl($gameId));
        $res=[];
         //  var_dump($this->initiator->lastUrl); die();
         //  var_dump($data); die();

        $eventsCollector=[];
        if (empty($data->included)) { yii::error("getEventsByGameId    gameId :    {$gameId}");  return ['errors'=>['some error see log file']];  }
        foreach ($data->included as $datum) {
            if($datum->type=='competition'){

            }else if($datum->type=='game'){

            }else if($datum->type=='event'){
                $eventsCollector[$datum->attributes->{'market-id'}][]=$datum;
            }else{
                var_dump($datum->type);
                die('not  $datum->type==\'competition\' or not  $datum->type==\'game\' or not $datum->type==\'event\' ' );
            }

        }

        foreach ($eventsCollector as $item) {
            foreach ($item as $event) {
//                var_dump($event);
//                die();
                if(in_array($event->attributes->{'market-id'},ConstantsHelper::AVELABLE_MAKRETS)) {
                    $res[] = ['id' => $event->id, 'marketId' => $event->attributes->{'market-id'}, 'marketName' => $event->attributes->{'market-name'}, 'eventName' => $event->attributes->{'event-name'}, 'cf' => $event->attributes->{'odd'}];
                }


            }


        }


        $resulte['data']=$res;
        $resulte['attr']=$data->data;
        return $resulte;
        return $res;

    }

    public function getTabsTourneyGames($tourneyId)
    {
        yii::error($this->initiator->getTourneyGamesTypeUrl($tourneyId));
        $data= $this->parse($this->initiator->getTourneyGamesTypeUrl($tourneyId)); //http://157.230.134.85:8081/lineSport/131927/ru/j_zaxscdvfq1w2e3r4
        $res=[];
        $sportId=$data->data[0]->relationships->sport->data->id;
        $gameCollector=[];


        $completition=[];
        $gameList=[];

        $gameList2=[]; // class
        $completition2=[]; // class

        $eventList=[];


        foreach ($data->included as $datum) {
            if($datum->type=='competition'){
                $completition[$datum->id]=['name'=>$datum->attributes->name,'elements'=>[]];
                $completition2[$datum->id]=$datum;
//                var_dump($datum); die();
            }else if($datum->type=='game'){
                $gameList[]=$datum;
                $gameList2[]= new GameS3($data->included,$datum);
                $gameCollector[]=$datum->attributes;
            }else if($datum->type=='event'){
                $eventList[$datum->id]=$datum;
            }else{
                var_dump($datum->type);
                die('not  $datum->type==\'competition\' or not  $datum->type==\'game\' or not $datum->type==\'event\' ' );
            }
            // $res[]=['id'=>$datum->{'league-id'},'name'=>$datum->{'league-name'},'count'=>$datum->{'games-count'}];
            //  echo      sprintf('id) %s count) %s name) %s',$datum->id,$datum->attributes->{'count'},$datum->attributes->{'user-locale-lng-name'}).PHP_EOL;
//            var_dump($datum->id);
//            var_dump($datum->attributes->{'count'});
//            var_export($datum->attributes->{'user-locale-lng-name'});
        }





        foreach ($gameCollector as $item) {
            $res[]=['id'=>$item->{'main-game-id'},'name'=>($item->{'team-1-user-locale-lng-name'}.' - '.$item->{'team-2-user-locale-lng-name'} ),'count'=>$item->{'event-count'}];
        }

        foreach ( $gameList2 as $item) {

        }

//        var_dump($gameList2); die();
        $dataResult=[];
        $completitionresult=[];
        foreach ( $completition2 as $item) {
//            var_dump($item); die();
            $completitionresult[]=new CompetitionS3($gameList2,$item);
        }


      //  echo count($completitionresult).PHP_EOL;
        /** @var CompetitionS3  $compe */
        foreach ($completitionresult as $compe) {
             //$sportName=$compe->getGames()[0]->attributes->{'user-locale-lng-name'};
             $tmpCompe=['data'=>[],'id'=>$compe->getId(),'name'=>$compe->getName(),'sport_id'=>$sportId,'sport_name'=>'Временное название спорта'];
            /** @var  GameS3 $game */
            foreach ($compe->getGames() as $game) {
//                $tmpGame=['data'=>[],'id'=>$game->getId()];
//            //    echo  sprintf('--%s : %s : %s', count($game->getEvents()),$game->getCurentObj()->attributes->{'league-user-locale-lng-name'},$game->getCurentObj()->attributes->{'team-1-user-locale-lng-name'},$game->getCurentObj()->attributes->{'team-2-user-locale-lng-name'} )   .PHP_EOL;
//                foreach ($game->getEvents() as $event) {
////                    $tmpGame['data'][]=$event->
//                        //      echo  sprintf('---%s : %s : %s',  $event->attributes->{'market-name'}, $event->attributes->{'event-name'}, $event->attributes->{'odd'} )    .PHP_EOL;
//                }
                $tmpCompe['data'][]=['attributes'=>$game->getAttr(),'events'=>$game->getEventsGroups()];
            }

           // if(!empty($tmpCompe['data']))    $dataResult[]=$tmpCompe;
               $dataResult[]=$tmpCompe;


        }

       $res=$dataResult;

        return $res;

    }




    public function getLastUrl()
    {
       return $this->initiator->lastUrl;
    }





    private function parse($url,$data=array(), $return_headers=false, $send_headers=array())
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);

//        curl_setopt($ch, CURLOPT_PORT, 3000);

        $result=curl_exec($ch);
        if($erCode=curl_errno($ch)) {echo "Error curl: {$erCode}   " . curl_error($ch);die();}
        curl_close($ch);

// Will dump a beauty json :3
//        return (json_decode($result));
        return   $array = json_decode(strip_tags($result));

    }

    /**
     * рабочая лощадка  $payload = '{"jsonrpc":"2.0","method":"frontend/category/get","params":{"by":{"service_id":0,"lang":"ru","sport_id":{"$in":[1]}}},"id":"10"}';
     * @param $url
     * @param array $data
     * @param bool $return_headers
     * @param array $send_headers
     * @return array|mixed
     */
    private function parse2($url, $data=array(), $return_headers=false, $send_headers=array())
    {
        $use_proxy=0;
        if($use_proxy){
            $proxy = '187.217.189.229:8080';
            $proxyauth = 'test:pass';
            $proxyauth = 0;
        }
        $payload = json_encode($data);
        $curl = curl_init();
        $send_headers[] = 'Content-Type:application/json';

        curl_setopt($curl, CURLOPT_URL, $url);

        if($use_proxy){
            curl_setopt($curl, CURLOPT_PROXY, $proxy);
            if($proxyauth){
                curl_setopt($curl, CURLOPT_PROXYUSERPWD, $proxyauth);
            }
        }


//        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $send_headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 300);




        if($return_headers)
        {
            curl_setopt($curl,CURLOPT_HEADER,true);
        }

        $out = curl_exec($curl);

//        var_dump($out);
        if($out)
        {

            $info = curl_getinfo($curl);

            $return = array();
            $return['res']=json_decode($out);
            $return['h'] = substr($out, 0, $info['header_size']);
           // $return['b'] = json_decode(substr($out, $info['header_size']), true);
            $return['b'] = json_decode(strip_tags($out, $info['header_size']));
            $return['i'] = $info;


            curl_close($curl);
//            var_dump($return['b']); die();
            return $return['b'];
        }
        else
        {
            curl_close($curl);
            return json_decode($out);
         //   return json_decode($out, true);
        }
    }


    private function parseOR($url,$data=array(), $return_headers=false, $send_headers=array())
    {
        // Create a client with a base URI
//        $client = new Client(['base_uri' => 'http://157.230.134.85:8081/']);
//        $response = $client->get('getChampsBySportId/line/12341/ru/j_zaxscdvfq1w2e3r4');
//        foreach (range(1,500) as $item) {
            $client = new Client();
          //  $response = $client->get('http://157.230.134.85:8081/getChampsBySportId/line/12341/ru/j_zaxscdvfq1w2e3r4');
          //  $response = $client->get('http://157.230.134.85:8081/lineSport/all/1546300800/1546759103/3/null/ru/j_zaxscdvfq1w2e3r4');  // => ------footbal id 12341
           // $response = $client->get('http://157.230.134.85:8081/getChampsBySportId/line/12341/ru/j_zaxscdvfq1w2e3r4');  //=>league-name: "Лига Чемпионов УЕФА", league-id: 131927,
           // $response = $client->get('http://157.230.134.85:8081/getChampsBySportId/line/12341/ru/j_zaxscdvfq1w2e3r4');
           //  var_dump( strip_tags($response->getBody()->getContents()));
          //  $r=$response->getBody()->getContents();
       // $response = $client->get($url);  //=>league-name: "Лига Чемпионов УЕФА", league-id: 131927,

        $response =    $client->request('GET', $url, ['allow_redirects' => false]);
        $array = json_decode(strip_tags($response->getBody()->getContents()));
        //var_dump($array);
         return $array;
    }


    
}
