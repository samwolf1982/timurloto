<?php

namespace common\models;

use common\models\DTO\WagerInfoStringResult;
use common\models\helpers\ConstantsHelper;
use Yii;

/**
 * This is the model class for table "wagerelements".
 *
 * @property int $id
 * @property int $wager_id user id
 * @property double $coef Коофициент конкретно 
 * @property string $event_id ид категории из парсера таблица Bets -> cтрочное ид на случай создание своих ставок 
 * @property string $outcome_id ид outcome_id  из парсера таблица Bets находится в outcames  -> cтрочное ид на случай создание своих ставок 
 * @property int $sport_id ИД  спорта
 * @property string $sport_name Название спорта
 * @property string $country_id ИД cтраны может гдето и некая категория
 * @property string $country_name Название cтраны может гдето и некая категория
 * @property string $category_id ид категории
 * @property string $category_name Категории имя из парсере
 * @property string $sub_category_id ID ПодКатегория
 * @property string $sub_category_name ПодКатегория имя из парсере
 * @property string $name Имя outcome
 * @property string $info_main_cat_name Имя из корзины (победа)
 * @property string $info_name Название (Ничья)
 * @property string $info_name_full Название (Олимпик Донецк - ФК Львов)
 * @property string $info_cat_name Название (1 Тайм)
 * @property int $status Статут 0 - не подтвердили(новая), 1-подтвердили, 2-зайшла 3-не зайшла 4-закрытая 5-блокировано
 * @property string $created_at
 *
 * @property Wager $wager
 */
class Wagerelements extends \yii\db\ActiveRecord
{

    //Статут 0 - не подтвердили(новая), 1-подтвердили, 2-зайшла 3-не зайшла 4-закрытая 5-блокировано

    public $infoName;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wagerelements';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wager_id', 'coef', 'status'], 'required'],
            [['wager_id', 'sport_id', 'status','startgame'], 'integer'],
            [['coef'], 'number'],
            [['created_at','countevents','infoName'], 'safe'],
            [['event_id', 'outcome_id', 'sport_name', 'country_id', 'country_name', 'category_id', 'category_name', 'sub_category_id', 'sub_category_name', 'name', 'info_main_cat_name', 'info_name', 'info_name_full', 'info_cat_name'], 'string', 'max' => 255],
            [['wager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wager::className(), 'targetAttribute' => ['wager_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wager_id' => 'wager id',
            'coef' => 'Коофициент',
           // 'event_id' => 'ид категории из парсера таблица Bets -> cтрочное ид на случай создание своих ставок ',
            'event_id' => 'ид категории',
            'outcome_id' => 'ид outcome_id  из парсера таблица Bets находится в outcames  -> cтрочное ид на случай создание своих ставок ',
            'sport_id' => 'ИД  спорта',
            'sport_name' => 'Вид спорта',
            'country_id' => 'ИД cтраны может гдето и некая категория',
            'country_name' => 'Название cтраны может гдето и некая категория',
            'category_id' => 'ид категории',

          //  'category_name' => 'Категории имя из парсере',
            'category_name' => 'Турнир',

            'sub_category_id' => 'ID ПодКатегория',

            //'sub_category_name' => 'ПодКатегория имя из парсере',
            'sub_category_name' => 'Игра',

            //'name' => 'Имя outcome',
            'name' => 'Cобытие',


            'info_main_cat_name' => 'Имя из корзины (победа)',
            'info_name' => 'Название (Ничья)',
            'info_name_full' => 'Название (Олимпик Донецк - ФК Львов)',
            'info_cat_name' => 'Название (1 Тайм)',
          //  'status' => 'Статут 0 - не подтвердили(новая), 1-подтвердили, 2-зайшла 3-не зайшла 4-закрытая 5-блокировано',
            'status' => 'Статуc',
            'created_at' => 'Created At',


            //  add
            'countevents' => 'Количество',
            'startgame' => 'Начало игры',
            'infoName'=>'Описание исхода'




        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWager()
    {
        return $this->hasOne(Wager::className(), ['id' => 'wager_id']);
    }


    public function getCountevents()
    {
        return Wagerelements::find()->where(['event_id' => $this->event_id])->count();

    }
    public function getCounteventsActive()
    {
        return Wagerelements::find()->where(['status' => Wager::STATUS_NEW])->count();

    }
    public function getCounteventsActiveLost($hour=4)
    {
        $nextWeek = time() - (ConstantsHelper::LOST_TIME_HOURS_NOT_CONFIRM * 60 * 60);   // 4*60*60    - 4 часа
        return '-';
        return Wagerelements::find()->where(['status' => Wager::STATUS_NEW])->andWhere(['<','startgame',$nextWeek]) ->count();

    }



    public  function getFormantedNameAndPercent(){
        $info=new WagerInfoStringResult($this->info_main_cat_name,$this->info_cat_name,$this->info_name,$this->coef);
        return $info->getFormantedNameAndPercent();  //7,200 ₽ - 37%
    }

    public  function getFormantedStartGame(){
        return gmdate("Y-m-d H:i", $this->startgame + 10800);
   //     return gmdate("Y-m-d H:i", $this->startgame + 7200);
//        return gmdate("Y-m-d H:i", ($this->startgame ) );
     //   return gmdate("Y-m-d H:i", ($this->startgame +(60*60*2)) );

    }


    public function getStatuswageritemimagelogo()
    {

        if($this->status == 6) return '/images/statuslogo/ok.png';
        if($this->status == 7) return '/images/statuslogo/no.png';


       // return $this->status;
    }





}
