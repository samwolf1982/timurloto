<?php

namespace common\models;

use common\models\helpers\ConstantsHelper;
use common\models\wraps\BetsExt;
use Yii;

/**
 * This is the model class for table "eventsnames".
 *
 * @property int $id
 * @property int $event_id event id   по нему идет запрос  по ставкам 
 * @property int $tournament_id tournament id   доп поле по какому идет запрос использовать в фронте из парсера не приходит 
 * @property string $event_name event name
 * @property int $event_dt event_dt не понятно
 * @property string $event_status_type event статус
 * @property int $category_id категории спорта, тип  id  из донора 
 * @property string $category_name Название events 
 * @property int $country_id country_id id  из донора 
 * @property string $tournament_name Название турнира 
 * @property int $tournament_is_summaries tournament_is_summaries  наверно статус или закончен
 * @property int $status 1 активная 0 не активная
 * @property int $sort sort 0 1 2 3..
 * @property int $is_updated обновлять ли категорию из парсера,следить 1-yes 0-no
 * @property int $total_count_outcomes подсчет собитий для избежания тяжелыъ  запросов к бд
 */
class Eventsnames extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventsnames';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'tournament_id', 'event_dt', 'category_id', 'country_id', 'status', 'sort', 'is_updated','total_count_outcomes'], 'integer'],
            [['event_name', 'event_status_type', 'category_name', 'tournament_name'], 'string'],
            [['tournament_is_summaries'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'event id   по нему идет запрос  по ставкам ',
            'tournament_id' => 'tournament id   доп поле по какому идет запрос использовать в фронте из парсера не приходит ',
            'event_name' => 'event name',
            'event_dt' => 'event_dt не понятно',
            'event_status_type' => 'event статус',
            'category_id' => 'категории спорта, тип  id  из донора ',
            'category_name' => 'Название events ',
            'country_id' => 'country_id id  из донора ',
            'tournament_name' => 'Название турнира ',
            'tournament_is_summaries' => 'tournament_is_summaries  наверно статус или закончен',
            'status' => '1 активная 0 не активная',
            'sort' => 'sort 0 1 2 3..',
            'is_updated' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',
            'total_count_outcomes' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',
        ];
    }

    public function getIshods(){

//        yii::error($this->event_id);
//        var_dump($this->event_id);
      //return Bets::find()->where(['event_id'=>$this->event_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->limit(5)->all(); // TournamentsnamesExt::findAll();
      return Bets::find()->select(['id','event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['event_id'=>$this->event_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->limit(1)->all(); // TournamentsnamesExt::findAll();

//        $modelsTmp=     $this->tFilter::find()->select(['id','event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['event_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
    //   return $this->hasMany(Bets::className(), ['event_id' => 'event_id'])->all();
      //  return $this->hasMany(BetsExt::className(), ['event_id' => 'tournament_id'])->andWhere(['status'=>ConstantsHelper::STATUS_ACTIVE])->count();

    }


    public function getCountoutcomes(){

//        return 989;
//        yii::error($this->event_id);
//        var_dump($this->event_id);
        //return Bets::find()->where(['event_id'=>$this->event_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->limit(5)->all(); // TournamentsnamesExt::findAll();
        return Bets::find()->where(['event_id'=>$this->event_id,'status'=>ConstantsHelper::STATUS_ACTIVE])->sum('count_outcomes'); // TournamentsnamesExt::findAll();

//        $modelsTmp=     $this->tFilter::find()->select(['id','event_id','market_id','outcomes','market_name','result_type_id','market_template_id','result_type_name'])->where(['event_id'=>$sportId,'status'=>1])->all(); // TournamentsnamesExt::findAll();
        //   return $this->hasMany(Bets::className(), ['event_id' => 'event_id'])->all();
        //  return $this->hasMany(BetsExt::className(), ['event_id' => 'tournament_id'])->andWhere(['status'=>ConstantsHelper::STATUS_ACTIVE])->count();

    }


}
