<?php

namespace common\models;

use Yii;

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
class Sportcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sportcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'sport_id', 'status', 'sort', 'is_updated'], 'integer'],
            [['category_name'], 'string'],
            [['category_is_summaries'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'category id  из донора',
            'category_is_summaries' => 'не понятно ',
            'category_name' => 'Название категории',
            'sport_id' => 'вид cпорт ид из донора',
            'status' => '1 активная 0 не активная',
            'sort' => 'sort 0 1 2 3..',
            'is_updated' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',
        ];
    }
}
