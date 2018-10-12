<?php

namespace common\models\wraps;

use common\models\Sportcategorynames;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sportcategorynames".
 *
 * @property int $id
 * @property int $sport_id sport id  из донора по нему связб с sportcategory
 * @property string $sport_name Название спорта
 * @property string $sport_short_name Название спорта короткое
 * @property string $sport_slug slug
 * @property int $status 1 активная 0 не активная
 * @property int $sort sort 0 1 2 3..
 * @property int $is_updated обновлять ли категорию из парсера,следить 1-yes 0-no
 */
class SportcategorynamesExt extends Sportcategorynames
{

    public static function getAll(){
    $models = Sportcategorynames::find()->where(['status'=>1])->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
    $items = ArrayHelper::map( $models,'sport_id','sport_name');
    return $items;
}
}
