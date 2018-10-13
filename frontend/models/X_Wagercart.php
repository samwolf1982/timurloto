<?php

namespace app\models;

use common\models\Bets;
use common\models\wraps\BetsExt;
use common\models\wraps\EventsnamesExt;
use Yii;
use yii\base\Model;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name Название команды
 * @property string $country Страна
 * @property string $clubname Название клуба
 * @property string $label метка для чемпионата
 *
 * @property Game[] $games
 * @property Game[] $games0
 */
class Wagercart extends Model  implements \dvizh\cart\interfaces\CartElement
{
    public $id;

    public $status;


    public $mainCatId;
    public $catId;
    public $eventId;
    public $position_id;

    public $catName;
    public $subCatname;
    public $name;
    public $name_full;
    public $coef;


    /**
     * Wagercart constructor.
     * @param $catId категория собития  в таблице бет.
     * @param $eventId  ид события
     * @param $eventsNameId  кто играет ид по нему берется имя и закидывается в корзину
     */
    function __construct($catId, $eventId, $eventsNameId) {
        parent::__construct();
        $bets= Bets::find()->where(['market_id'=>$catId])->one();
        $this->catId=$catId;
        $this->eventId=$eventId;
        //SELECT * FROM `eventsnames` WHERE `event_id` =15536181;
      $eventsModel=  EventsnamesExt::find()->where(['event_id'=>$eventsNameId])->cache(120)->one();
        if ($bets && $eventsModel){
            // имя кто с кем играет
            $this->name_full=$eventsModel->event_name;
            $this->catName=$bets->market_name;
            $this->subCatname=$bets->result_type_name;
            $this->mainCatId=$bets->event_id;
            $p= json_decode($bets->outcomes,true);
            foreach ($p as $item) {
                if( $item['outcome_id'] == $eventId ){
                    $this->name=$item['outcome_name'];
                    $this->coef=$item['outcome_coef'];
                    break;
                }
            }
         //   yii::error([$this->eventId, $this->catName,$this->subCatname, $this->name, $this->coef]);
        }
    }

    public function getCartId()
    {
        // TODO: Implement getCartId() method.
        return $this->eventId;
    }

    public function getCartName()
    {
        // TODO: Implement getCartName() method.
        return $this->name;
    }

    public function getCartPrice()
    {
        // TODO: Implement getCartPrice() method.
        return 111;
    }

    public function getCartOptions()
    {
        // TODO: Implement getCartOptions() method.
        return [
            '1' => [
                'name' => 'Цвет',
                'variants' => ['1' => 'Красный', '2' => 'Белый', '3' => 'Синий'],
            ],
            '2' => [
                'name' => 'Размер',
                'variants' => ['4' => 'XL', '5' => 'XS', '6' => 'XXL'],
            ]
        ];
    }
}
