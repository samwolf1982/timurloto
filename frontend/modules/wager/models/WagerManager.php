<?php
namespace frontend\modules\wager\models;


use frontend\modules\statistic\models\PlaylistManager;
use common\models\DTO\WagerInfo;
use common\models\Eventsnames;
use common\models\helpers\ConstantsHelper;
use common\models\helpers\OutcomeParser;
use common\models\helpers\ReaderParams;
use common\models\Playlist;
use common\models\Sportcategorynames;
use common\models\Tournamentsnames;
use common\models\Wager;
use common\models\Wagerelements;
use dvizh\cart\Cart;
use komer45\balance\models\Score;
use yii;
use yii\helpers\ArrayHelper;

class WagerManager
{

    private $cart;
    private $user_id;
    private $playlist_id;
    private $comment;
    private $wager_id;
    private $sum;
    private $select_coef;
    private $is_private;
    private $wagerInfo;

    public function __construct(  $cart_post, WagerInfo  $wagerInfo)
    {

        $this->cart= $this->genPseudoCart($cart_post);
        $this->user_id=$wagerInfo->getUserId();
        $this->comment=$wagerInfo->getComment();
        $this->sum=$wagerInfo->getSum();
        $this->is_private=$wagerInfo->getisPrivate();
        $this->select_coef=$wagerInfo->getSelectCoef();
        $curentPlaylist = PlaylistManager::getPlaylistByUserIdAndId($this->user_id,$wagerInfo->getPlaylistId());
        //Плейлист по умолчанию всегда должен быть.
        if(empty($curentPlaylist)){
            $resultCreatePlaylist=PlaylistManager::addElement($this->user_id,'Плейлист по умолчанию');
            if ( !empty($resultCreatePlaylist['id'])){
                $this->playlist_id=$resultCreatePlaylist['id'];
            }else{
                throw  new \InvalidArgumentException('ошыбка в PlaylistManager'.__DIR__.'/'.__FILE__);
            }
        }else{
            $this->playlist_id=$wagerInfo->getPlaylistId();
        }

        $this->wagerInfo=$wagerInfo;

    }


    /**
     * генерация из пост псевдоелементов корзины (от старого кода)
     * @param $cart
     */
    private function genPseudoCart($cart_post)
    {

        $reader=new ReaderParams($cart_post);


        return  $reader->getLocalBetelements() ;


    }


    public function add($bid=0){
      //  $elements = yii::$app->cart->elements;
//        yii::error($this);
        $wager=new Wager();
        $wager->user_id=$this->user_id;
        $wager->playlist_id=$this->playlist_id;
        $wager->total=$this->sum;
        $wager->status=Wager::STATUS_CREATE;
        $wager->comment= $this->comment;
        $wager->created_at=date('Y-m-d H:i:s');
        $wager->coef=0;
        $wager->bid=$bid;
        $wager->is_private=$this->is_private;
        $wager->select_coef=$this->select_coef;

        if($wager->validate()){
            $wager->save();
            $this->wager_id=$wager->id;
        }else{
            throw  new \InvalidArgumentException(print_r($wager->errors,true));
        }
        // теперь елементы
        $total_coef=   $this->addWagerElements();
        // обновить коофи и статус и ставка готова
        $wager->coef=$total_coef;
        $wager->status=Wager::STATUS_NEW;


        $wager->save();
        return $wager->id;
    }

    // проход по корзине и добавить елементы.
    private function addWagerElements(){
        $total_coef=1;



//        'group_item_id' => '231735495',
//    'item_id' => '231735495-1-12341-0',
//    'gamersName' => 'Лион - Барселона',
//    'name' => 'П1',
//    'status' => 'true',
//    'coef' => '4.80',
//        var_dump($this->cart);
        foreach ($this->cart as $i=> $element) {
            $outcomeCoefficient=(float)$element['coef'];
          if(empty($outcomeCoefficient) ||  $outcomeCoefficient<=1)continue;
            $total_coef *= $outcomeCoefficient;
            $this->addWagerElement($element,$this->wagerInfo->getResulto($i));
         }
         return $total_coef;
    }

    private function addWagerElement($element,$ob){

            $wagerelement= new Wagerelements();
            $wagerelement->wager_id=$this->wager_id;
            $wagerelement->event_id=  (string) $element['item_id'];
            $wagerelement->coef= $element['coef'];
            $wagerelement->status=Wager::STATUS_NEW;
            $wagerelement->name=$element['name'];
             $wagerelement->info_name=   $element['gamersName'];
            $wagerelement->sub_category_id=(string)'0';
            $wagerelement->info_main_cat_name=  $element['mname']; // marketname  фора

//        'current_market_name' => 'current_market_name from json',
//            'result_type_name' => 'result type name ',
//            'gamers_name' => 'gamers name',
// todo сверитьт с предыдущейй верстисее
            $wagerelement->info_name_full=$ob->{'team-1-name_ru'} .' - '.$ob->{'team-2-name_ru'} ;
            $wagerelement->info_cat_name=$element['name'];
            $wagerelement->created_at=date('Y-m-d H:i:s');
            $wagerelement->startgame=$this->wagerInfo->getStarttimeGameById($element['item_id']);
            $wagerelement->outcome_id=$this->wagerInfo->getGroupItemIdById($element['item_id']);

if(0){
    $info_about_turnire=$this->searchSportNameCategoryName($element);

    $wagerelement->sport_name=$info_about_turnire['sport_name'];
    $wagerelement->country_name=$info_about_turnire['category_name'];
    $wagerelement->category_name=$info_about_turnire['tournament_name'];
    $wagerelement->sub_category_name =$info_about_turnire['event_name'];
    $wagerelement->sport_id =$info_about_turnire['sport_id'];
    $wagerelement->country_id =$info_about_turnire['country_id'];
    $wagerelement->category_id =$info_about_turnire['category_id'];
}


//         $addINfo=
         $wagerelement->sport_name=$ob->{'sport-name_ru'};
         $wagerelement->country_name='a2';
         $wagerelement->category_name=$ob->{'league-name_ru'};
         $wagerelement->sub_category_name ='a4';
         $wagerelement->sport_id =555;
         $wagerelement->country_id ='a6';
        $wagerelement->category_id ='a7';



        if($wagerelement->validate()){
            $wagerelement->save();
        }else{
            throw  new \InvalidArgumentException(print_r($wagerelement->errors,true));
        }
    }

    public static function getFullCoeficientByPost($postElements)
    {

        $coef=1;
        foreach ($postElements as $item) {
                 $coef*=  (float) $item['CartElement']['coef'];
           }
           return  round( $coef,2);
    }
    private function searchSportNameCategoryName($element){

       // $eventsnames=Eventsnames::find()->where(['event_id'=>$element->category_id])->one();
        $eventsnames=Eventsnames::find()->where(['event_id'=>$element->parent_id])->one();
        $tournamentsnames=Tournamentsnames::find()->where(['tournament_id'=>$eventsnames->tournament_id])->one();
        $sportcategory= Sportcategorynames::find()->where(['sport_id'=>$tournamentsnames->sport_id])->one();

        $sport_name=$sportcategory->sport_name;
        $sport_id=$sportcategory->sport_id;
        $tournament_name=$eventsnames->tournament_name;

        $country_id=$eventsnames->category_id;

        $category_name=$eventsnames->category_name;
        $category_id=null;

        $event_name=$eventsnames->event_name;

        return ['sport_name'=>$sport_name,'tournament_name'=>$tournament_name,'category_name'=>$category_name,'event_name'=>$event_name,'sport_id'=>$sport_id,
            'country_id'=>(string)$country_id,'category_id'=>(string)$category_id,
        ];
        //  $element->category_id  ==>  SELECT * FROM `eventsnames` WHERE `event_id`=15319348 ;
        //      =>tournament_name  (премер лига)
        //      =>category_name  (Украина)
        //      =>event_name  (Олимпик Донецк - ФК Львов)
        //  SELECT * FROM `eventsnames` WHERE `event_id`=15319348 ;      =>tournament_name  (премер лига)

        //      потом SELECT * FROM `tournamentsnames` WHERE `tournament_id`=17137 (eventsnames->sport_id)
        //     SELECT * FROM `sportcategorynames` WHERE `sport_id` = 1 (eventsnames->sport_id)  =>sport_name

    }



    static public function preValidateOldDELETE(Cart $cart,$user_id,&$errorLocalLog){
        // криттические проверки, необычные действия
        $current_cart=$cart->getCart()->my();
            if($cart->getCount()==0 ) { $e='попытка дать ставку на пустую корзину'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
            if(empty( $current_cart->playlist_id)){  $e='попытка дать ставку без плейлиста'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
            if(empty( $current_cart->coefficient)) { $e='попытка дать ставку без коофициента в корзине'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
        if(!empty( $current_cart->coefficient) && $current_cart->coefficient < 1 ) { $e='попытка дать ставку  с коофициентом меньше 1'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
        if(!empty( $current_cart->current_coefficient) && $current_cart->coefficient > 10 ) { $e='попытка дать ставку  с коофициентом больше 10'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
        $b= Score::find()->where(['user_id' => $user_id])->one()->balance;
        if(empty( $b)) { $e='у пользователя нету баланса'; $errorLocalLog[]=$e; yii::error([]); return false; };
        $curent_playlist=Playlist::find()->where(['id'=>$current_cart->playlist_id])->one();
        if(empty( $curent_playlist)) { $e='у пользователя нету плейлиста'; $errorLocalLog[]=$e; yii::error([$e]); return false; };


        // польльзователшьские проверки
        // достаточно ли на балансе?
        $total_sum =  WagerManager::calculateTotalSum($cart,$user_id,$current_cart->coefficient,false); // ручнную сумму еще нужно доделать
        if($b < $total_sum ) { $e='у пользователя недостаточно на балансе '+$total_sum .' | '.$b; $errorLocalLog[]=$e; return false;}
        $total_balance  = number_format($b, 0, '', ',');


        // проход по ставкам и если еще доступные тогда +
        $gate=true;
        foreach ($cart->elements as $element) {
            if(!$element->status){ $gate=false; break; }
        }
        if($gate){  $e='пустая ставка'; $errorLocalLog[]=$e; return false;  }



       return true;
//        if(empty($post)) return false;
//        if(Playlist::find()->where(['user_id'=>$user_id,])->count() >= Playlist::LIMIT ) return false;
//        return true;
    }


    /**
     * валидация ставки доступность баланс и тд
     * @param $post
     * @param $user_id
     * @param $errorLocalLog
     * @return bool
     */
    static public function preValidate($post, $user_id, &$errorLocalLog){
       // yii::error($post);
     //   $post['playlist_id']=1;
//        var_dump($post['CartElement']); die();

        // проверка на дубли


        // криттические проверки, необычные действия
        if(empty($post) OR empty($post['CartElements'])   ) { $e='попытка дать ставку на пустую корзину'; $errorLocalLog[]=$e; yii::error([$e]); return false; };





        $ountOpenElementStatus=false; // проверка на корзину с выкл чекбоксами
        foreach ($post['CartElements'] as $cE) {
            yii::error($cE['CartElement']['status']);
            if($cE['CartElement']['status']!='false') { $ountOpenElementStatus=true; break;  };
        }
        yii::error(['statuse'=> $ountOpenElementStatus]);
        if(!$ountOpenElementStatus)   { $e='попытка дать ставку на пустую корзину'; $errorLocalLog[]=$e; yii::error([$e]); return false; }


        if(empty($post['statusBet'])   ) { $e='Нету статуса'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
//        if(empty( $current_cart->playlist_id)){  $e='попытка дать ставку без плейлиста'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
//        if(empty( $current_cart->coefficient)) { $e='попытка дать ставку без коофициента в корзине'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
//        if(!empty( $current_cart->coefficient) && $current_cart->coefficient < 1 ) { $e='попытка дать ставку  с коофициентом меньше 1'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
//        if(!empty( $current_cart->current_coefficient) && $current_cart->coefficient > 10 ) { $e='попытка дать ставку  с коофициентом больше 10'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
        $b= Score::find()->where(['user_id' => $user_id])->one()->balance;
        if(empty( $b)) { $e='у пользователя нету баланса'; $errorLocalLog[]=$e; yii::error([]); return false; };

        // проверка на плейлист
//        $curent_playlist=Playlist::find()->where(['id'=>$current_cart->playlist_id])->one();
//        if(empty( $curent_playlist)) { $e='у пользователя нету плейлиста'; $errorLocalLog[]=$e; yii::error([$e]); return false; };


        // польльзователшьские проверки
        // достаточно ли на балансе?
       // $total_sum =  WagerManager::calculateTotalSum($cart,$user_id,$current_cart->coefficient,false); // ручнную сумму еще нужно доделать

        $totalSumCoeficient=0;
        foreach ($post['CartElements'] as $cE) {
            $totalSumCoeficient+=$cE['CartElement']['coef']; // возможно нужно умножать проверить
        }

        if(empty($totalSumCoeficient) or  $totalSumCoeficient <= 1 )  { $e='Нулевой коофициент или меньше 1 ставка не возможна'; $errorLocalLog[]=$e; yii::error([$e]); return false; };

        $total_sum =  WagerManager::calculateTotalSumForBet($user_id,$totalSumCoeficient,false); // ручнную сумму еще нужно доделать
        if($b < $total_sum ) { $e='у пользователя недостаточно на балансе '+$total_sum .' | '.$b; $errorLocalLog[]=$e; return false;}
        $total_balance  = number_format($b, 0, '', ',');



        //todo1
        // проверка на соответсвие коофициента к списку процентов currentCooeficientDrop


        $listIdBets=[];
        foreach ($post['CartElements'] as $cE) {

            if($cE['CartElement']['status']!='false') $listIdBets[]=$cE['CartElement']['group_item_id'];

           // $totalSumCoeficient+=$cE['CartElement']['coef']; // возможно нужно умножать проверить
        }



        if(YII_ENV == 'prod' || 1){
            $isRepeatBet=   WagerManager::checkManyBets($user_id,$listIdBets);
            if($isRepeatBet)  { $e='На каждое событие можно ставить не более '.ConstantsHelper::MAX_BET_TODO.' раз'; $errorLocalLog[]=$e; yii::error([$e]); return false; };
        }



        // проход по ставкам и если еще доступные тогда +
        $gate=true;
//        foreach ($cart->elements as $element) {
//            if(!$element->status){ $gate=false; break; }
//        }
//        if($gate){  $e='пустая ставка'; $errorLocalLog[]=$e; return false;  }





        return true;
//        if(empty($post)) return false;
//        if(Playlist::find()->where(['user_id'=>$user_id,])->count() >= Playlist::LIMIT ) return false;
//        return true;
    }


    /**
     * созадаме ставку
     * @param $user_id
     * @param $post
     * @param $total_sum
     */
    public static function makeBet($user_id, $post, $total_sum)
    {



        $reader=new ReaderParams($post);
//        var_dump($reader->getSingleBet());
//        var_dump($total_sum);
//        die();

//        die();





        if(0){ // single
            $betData =[
                "events"=>$reader->getSingleBet() // arr
                ,
                "user_id"=> $user_id,
                "type"=> "Single",
                "stake"=> $total_sum,
//            "stake"=> 150,
                "option"=> null,
                "ApiKEY"=> "j_zaxscdvfq1w2e3t7",
            ];
        }






        // Multiple
        $betData =[
           // "events"=>$reader->getMultiBet() // arr
            "events"=>$reader->getBetelements() // arr
            ,
            "user_id"=> $user_id,
           // "type"=> "Multiple",
            "type"=> $reader->getTypeBet(),
            "stake"=> $total_sum,
//            "stake"=> 150,
            "option"=> null,
            "ApiKEY"=> "j_zaxscdvfq1w2e3t7",
        ];



//        $url = 'http://confirm.lookmybets.com/bet';
        $url = ConstantsHelper::URL_CREATE_BET;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $betData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);


//        $res=json_decode($response);
         // var_dump($response); die();

//        return $response;
      return  json_decode($response);

//process $response


//        $betData =[
//        "events"=> [
//            "market_id"=> "market_id",
//            "event_id"=> "event_id",
//            "sport_id"=> "sport_id",
//            "league_id"=> "117849",
//            "country_id"=> "4",
//            "country_code"=> "AU",
//            "start_result"=> "-",
//            "game_id"=> "game_id",
//           // game_short_id: 7004, //need to paste real value or
//           // game_short_id: 40391, //need to paste real value
//            "game_short_id" => "shortId", //need to paste real value
//            "base"=> "base",
//            "odd" => "c_f",
//            // val:val,
//            //    start: 1547369100, //unix timestamp
//          //  start: 1550001600, //unix timestamp
//            "start"=> "startTime", //unix timestamp
//            //  type: "live", //все live
//            "type"=> "line",
//            "is_main_game"=> true,
//            "overtime"=>null
//        ,],
//        "user_id"=> "user_id",
//         "type"=> "Single",
//        "stake"=> "stake",
//        "option"=> null,
//        "ApiKEY"=> "j_zaxscdvfq1w2e3t7",
//    ];
        var_dump($betData);

        return 'res malkebet';
    }



    public  static  function  checkManyBets($uid,$bet_id_list){

       Yii::error([$uid,$bet_id_list]);
       $sql="SELECT id  FROM `wager` WHERE `user_id`={$uid} and `status` = 0 ;";
       $wageroList=[];
        foreach (Yii::$app->db->createCommand($sql)->queryAll() as $wagero ) {
            $wageroList[]= $wagero['id'];
        };

        $wageroList=implode(',',$wageroList );
        if(!empty($wageroList)){ // when no wagers

            $sql="SELECT wagerelements.event_id , wagerelements.outcome_id   FROM wagerelements WHERE wager_id in ({$wageroList});";
            $parseIdList=[];
            foreach (Yii::$app->db->createCommand($sql)->queryAll() as $wagero ) {
                $idd=explode('-',$wagero['event_id']);
//                $parseIdList[]= $idd[0];
                $parseIdList[]= $wagero['outcome_id'];

            };
                foreach ($parseIdList as $idElId) {
                       $idd=explode('-',$idElId);
                }


                $resDiff=(array_diff(array_count_values($parseIdList),$bet_id_list));
           yii::error((array_diff(array_count_values($parseIdList),$bet_id_list)));

            foreach ($bet_id_list as $item) {
                       if(isset($resDiff[$item])){
                           $countEl=  $resDiff[$item];
                           if($countEl>=ConstantsHelper::MAX_BET_TODO) return true;   // есть попадание количесвта ид
                       }

                }
        }
        yii::error($wageroList);
        yii::error($parseIdList);


        return false; // одинаковых нету

    }

    /**
     * значение для одиночной ставки по ид из фронта
     * @param $url
     * @return mixed|string
     */
    public static function getSingleBetInfo($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
      //  return $response;
        return  json_decode($response);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $betData));



//process $response


//        $betData =[
//        "events"=> [
//            "market_id"=> "market_id",
//            "event_id"=> "event_id",
//            "sport_id"=> "sport_id",
//            "league_id"=> "117849",
//            "country_id"=> "4",
//            "country_code"=> "AU",
//            "start_result"=> "-",
//            "game_id"=> "game_id",
//           // game_short_id: 7004, //need to paste real value or
//           // game_short_id: 40391, //need to paste real value
//            "game_short_id" => "shortId", //need to paste real value
//            "base"=> "base",
//            "odd" => "c_f",
//            // val:val,
//            //    start: 1547369100, //unix timestamp
//          //  start: 1550001600, //unix timestamp
//            "start"=> "startTime", //unix timestamp
//            //  type: "live", //все live
//            "type"=> "line",
//            "is_main_game"=> true,
//            "overtime"=>null
//        ,],
//        "user_id"=> "user_id",
//         "type"=> "Single",
//        "stake"=> "stake",
//        "option"=> null,
//        "ApiKEY"=> "j_zaxscdvfq1w2e3t7",
//    ];
        var_dump($betData);

        return 'res malkebet';
    }



    /**
     *  старый код удалить если нету ссылок
     * @param Cart $cart
     * @param $user_id
     * @param $coefficient
     * @param bool $manualSum   еще доделать  если нужно будет
     * @return int
     */
    static public function calculateTotalSum(Cart $cart, $user_id, $coefficient, $manualSum=false){
        if(!$manualSum){
            $totalSum=0;
            $current_cart=$cart->getCart()->my();
            $b= Score::find()->where(['user_id' => $user_id])->one()->balance;
            $percentSum =    $b*$coefficient/100;
            //$totalSum  = number_format($percentSum, 0, '', ',');
            $totalSum  = $percentSum;
        }else{
            $totalSum=0;
        }


        return $totalSum;
    }


    /**
     * подсчет  суммы из коофициента  общего
     * на входе только коофициент для ставки
     * @param $user_id
     * @param $coefficientSum
     * @param bool $manualSum
     * @return float|int
     */
    static public function calculateTotalSumForBet($user_id, $coefficientSum, $manualSum=false){
        if(!$manualSum){
            $b= Score::find()->where(['user_id' => $user_id])->one()->balance;
            $percentSum =    $b*$coefficientSum/100;
            //$totalSum  = number_format($percentSum, 0, '', ',');
            $totalSum  = $percentSum;
        }else{
            $totalSum=0;
        }


        return $totalSum;
    }


    static public function getWagersByUser($user_id,$play_list_limit=8,$page=0){

    }

    /**
     * уборка елементов что не выбраны    ЕСЛИ ВАЛИДАТОР ПУСТИТ БУДЕТ ОШЫБКА  ПУСТОЙ  $res=['CartElements']
     * @param $post
     * @return array
     */
    static public function clearPost($post){
        $res=[];
        foreach ($post['CartElements'] as $cE) {
            if($cE['CartElement']['status']!='false') { $res['CartElements'][]=$cE; };
        }
        return $res;
    }







}
