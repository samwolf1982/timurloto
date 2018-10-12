<?php

namespace common\models\wraps;

use common\models\Eventsnames;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "eventsnames".
 *
 * @property int $id
 * @property int $event_id event id   по нему идет запрос  по ставкам 
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
 */
class EventsnamesExt extends Eventsnames
{

    public static function getAll(){
        $models = Eventsnames::find()->where(['status'=>1])->limit(20)->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        $items = ArrayHelper::map( $models,'event_id','event_name');
        return $items;
    }




}
