<?php

namespace common\models\wraps;

use common\models\Eventsnames;
use common\models\helpers\ConstantsHelper;
use common\models\Tournamentsnames;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tournamentsnames".
 *
 * @property int $id
 * @property int $category_id категории спорта, тип  id  из донора 
 * @property int $sport_id sport id  из донора 
 * @property int $tournament_id tournament id  из донора 
 * @property int $tournament_is_summaries tournament_is_summaries  не понятно 
 * @property string $tournament_name Название tournament 
 * @property int $status 1 активная 0 не активная
 * @property int $sort sort 0 1 2 3..
 * @property int $is_updated обновлять ли категорию из парсера,следить 1-yes 0-no
 */
class TournamentsnamesExt extends Tournamentsnames
{

    public static function getAll(){
        $models = Tournamentsnames::find()->where(['status'=>ConstantsHelper::STATUS_ACTIVE])->limit(20)->all();
        $items = ArrayHelper::map( $models,'tournament_id','tournament_name');
        return $items;
    }

    public function getCountevents(){

        return $this->hasMany(Eventsnames::className(), ['tournament_id' => 'tournament_id'])->andWhere(['status'=>ConstantsHelper::STATUS_ACTIVE])->count();

    }
}
