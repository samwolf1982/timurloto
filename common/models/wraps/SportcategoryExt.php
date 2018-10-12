<?php

namespace common\models\wraps;

use common\models\Sportcategory;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sportcategory".
 *
 * @property int $id
 * @property int $category_id category id  из донора
 * @property int $category_is_summaries не понятно 
 * @property string $category_name Название категории
 * @property int $sport_id вид cпорт ид из донора
 * @property int $status 1 активная 0 не активная
 * @property int $sort sort 0 1 2 3..
 * @property int $is_updated обновлять ли категорию из парсера,следить 1-yes 0-no
 */
class SportcategoryExt extends Sportcategory
{
    public static function getAll(){
        $models = Sportcategory::find()->where(['status'=>1])->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        $items = ArrayHelper::map( $models,'category_id','category_name');
        return $items;
    }
}
