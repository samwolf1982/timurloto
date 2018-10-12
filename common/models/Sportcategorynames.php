<?php

namespace common\models;

use Yii;

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
class Sportcategorynames extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sportcategorynames';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sport_id', 'status', 'sort', 'is_updated'], 'integer'],
            [['sport_name', 'sport_short_name', 'sport_slug'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sport_id' => 'sport id  из донора по нему связб с sportcategory',
            'sport_name' => 'Название спорта',
            'sport_short_name' => 'Название спорта короткое',
            'sport_slug' => 'slug',
            'status' => '1 активная 0 не активная',
            'sort' => 'sort 0 1 2 3..',
            'is_updated' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',
        ];
    }
}
