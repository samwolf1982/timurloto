<?php
namespace app\modules\wager\models;
use app\modules\statistic\models\PlaylistManager;
use common\models\DTO\WagerInfo;
use common\models\Eventsnames;
use common\models\Playlist;
use common\models\Sportcategorynames;
use common\models\Tournamentsnames;
use common\models\Wager;
use common\models\Wagerelements;
use dvizh\cart\Cart;
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


    public function __construct(  $cart, WagerInfo  $wagerInfo)
    {
        $this->cart=$cart;
        $this->user_id=$wagerInfo->getUserId();
        $this->comment=$wagerInfo->getComment();
        $this->sum=$wagerInfo->getSum();
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
        yii::error($this);

        $wager=new Wager();
        $wager->user_id=$this->user_id;
        $wager->playlist_id=$this->playlist_id;
        $wager->total=$this->sum;
        $wager->status=Wager::STATUS_CREATE;
        $wager->comment= $this->comment;
        $wager->created_at=date('Y-m-d H:i:s');
        $wager->coef=0;
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
        $wager->status=Wager::STATUS_OPEN; $wager->save();
    }

    // проход по корзине и добавить елементы.
    private function addWagerElements(){
        $total_coef=1;
        foreach ($this->cart->elements as $element) {
            if($element->coof<=1) continue;
            $this->addWagerElement($element);
            $total_coef *= $element->coof;
         }
         return $total_coef;
    }

    private function addWagerElement($element){
            $wagerelement= new Wagerelements();
            $wagerelement->wager_id=$this->wager_id;
            $wagerelement->event_id=  (string) $element->item_id;
            $wagerelement->coef= $element->coof;
            $wagerelement->status=Wager::STATUS_NEW;
            $wagerelement->name=$element->name_full;
            $wagerelement->sub_category_id=(string)$element->category_id;
            $wagerelement->info_main_cat_name=$element->main_cat_name;
            $wagerelement->info_name=$element->name;
            $wagerelement->info_name_full=$element->name_full;
            $wagerelement->info_cat_name=$element->cat_name;
            $wagerelement->created_at=date('Y-m-d H:i:s');
//        main_cat_name
//name
//name_full
//cat_name
            $info_about_turnire=$this->searchSportNameCategoryName($element);
            yii::error($info_about_turnire);


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

        $eventsnames=Eventsnames::find()->where(['event_id'=>$element->category_id])->one();
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







    static public function preValidate(Cart $cart,$user_id){
            if($cart->getCount()==0 ) return false;
        // проход по ставкам и если еще доступные тогда +



       return true;
//        if(empty($post)) return false;
//        if(Playlist::find()->where(['user_id'=>$user_id,])->count() >= Playlist::LIMIT ) return false;
//        return true;
    }

    static public function getWagersByUser($user_id,$play_list_limit=8,$page=0){

    }







}
