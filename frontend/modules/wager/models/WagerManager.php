<?php
namespace app\modules\wager\models;
use app\modules\statistic\models\PlaylistManager;
use common\models\DTO\WagerInfo;
use common\models\Eventsnames;
use common\models\helpers\OutcomeParser;
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

    public function __construct(  $cart, WagerInfo  $wagerInfo)
    {
        $this->cart=$cart;
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

    }

    public function add(){
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
        $wager->status=Wager::STATUS_OPEN;


        $wager->save();
    }

    // проход по корзине и добавить елементы.
    private function addWagerElements(){
        $total_coef=1;
        foreach ($this->cart->elements as $element) {
            $outcomeCoefficient=OutcomeParser::getCoefficient($element);
            //json_decode($element->options);
//            $total_coef *= $element->coof;
//            yii::error($element->status);
          if($element->status)   continue;
          if(empty($outcomeCoefficient) ||  $outcomeCoefficient<=1)continue;
            $total_coef *= $outcomeCoefficient;
            $this->addWagerElement($element);
             if(CLEAR_CART){
                 $element->delete();
             }
             // $element->delete();
         }
         return $total_coef;
    }

    private function addWagerElement($element){
            $wagerelement= new Wagerelements();
            $wagerelement->wager_id=$this->wager_id;
            $wagerelement->event_id=  (string) OutcomeParser::getId($element);
            $wagerelement->outcome_id= (string) $element->item_id;
//            $wagerelement->coef= $element->coof;
            $wagerelement->coef= OutcomeParser::getCoefficient($element);
            $wagerelement->status=Wager::STATUS_NEW;
//            $wagerelement->name=$element->name_full;
            //$wagerelement->name=sprintf('%s %s %s',$element->current_market_name,$element->result_type_name,$element->gamers_name);
            $wagerelement->name=OutcomeParser::getName($element);

            $wagerelement->sub_category_id=(string)$element->parent_id;
//            $wagerelement->sub_category_id=(string)$element->category_id;
            $wagerelement->info_main_cat_name=$element->current_market_name;

//        'current_market_name' => 'current_market_name from json',
//            'result_type_name' => 'result type name ',
//            'gamers_name' => 'gamers name',
// todo сверитьт с предыдущейй верстисее
            //$wagerelement->info_name=   $element->name;
            $wagerelement->info_name=   $element->result_type_name;
//            $wagerelement->info_name_full=sprintf('%s %s %s',$element->current_market_name,$element->result_type_name,$element->gamers_name);
            $wagerelement->info_name_full=$element->gamers_name;


//            $wagerelement->info_cat_name=$element->cat_name;
//            $wagerelement->info_cat_name= $element->result_type_name;
            $wagerelement->info_cat_name=OutcomeParser::getName($element);;
            $wagerelement->created_at=date('Y-m-d H:i:s');
//        main_cat_name
//name
//name_full
//cat_name
            $info_about_turnire=$this->searchSportNameCategoryName($element);
//            yii::error($info_about_turnire);


//        ['sport_name' => 'Футбол', 'tournament_name' => 'Премьер Лига', 'category_name' => 'Украина', 'event_name' => 'Олимпик Донецк - ФК Львов',]
        // sport_id
         $wagerelement->sport_name=$info_about_turnire['sport_name'];
         $wagerelement->country_name=$info_about_turnire['category_name'];
         $wagerelement->category_name=$info_about_turnire['tournament_name'];
         $wagerelement->sub_category_name =$info_about_turnire['event_name'];
         $wagerelement->sport_id =$info_about_turnire['sport_id'];
         $wagerelement->country_id =$info_about_turnire['country_id'];
        $wagerelement->category_id =$info_about_turnire['category_id'];



        if($wagerelement->validate()){
            $wagerelement->save();
        }else{
            throw  new \InvalidArgumentException(print_r($wagerelement->errors,true));
        }
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


    static public function preValidate(Cart $cart,$user_id,&$errorLocalLog){
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
            $totalSum  = number_format($percentSum, 0, '', ',');
        }else{
            $totalSum=0;
        }


        return $totalSum;
    }


    static public function getWagersByUser($user_id,$play_list_limit=8,$page=0){

    }







}
