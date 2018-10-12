<?php

namespace common\models\wraps;

use common\models\Bets;
use Yii;

/**
 * This is the model class for table "bets".
 *
 * @property int $id
 * @property int $event_id event id 
 * @property int $market_id market_id  не понятно
 * @property string $market_name market_name название для групы например фора тотал ...
 * @property string $market_order market_order идентификатор донора возможно
 * @property string $outcomes outcomes JSON строка коофициентов
 * @property int $market_suspend неясно 
 * @property int $market_template_id неясно 
 * @property int $market_template_view_id неясно 
 * @property int $market_template_weigh неясно 
 * @property int $result_type_id неясно 
 * @property string $result_type_name имя результата 
 * @property string $result_type_short_name имя результата короткое
 * @property int $result_type_weigh неясно
 * @property int $service_id service_id
 * @property int $sport_id sport_id
 * @property int $status 1 активная 0 не активная
 * @property int $sort sort 0 1 2 3..
 * @property int $is_updated обновлять ли категорию из парсера,следить 1-yes 0-no
 */
class BetsExt extends Bets
{


    // dont use
    public static function getAll(){
        $models = Bets::find()->where(['status'=>1])->limit(20)->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        $items = ArrayHelper::map( $models,'event_id','event_name');
        return $items;
    }
}
