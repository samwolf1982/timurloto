<?php

namespace common\models;

use Yii;

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
class Tournamentsnames extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tournamentsnames';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'sport_id', 'tournament_id', 'status', 'sort', 'is_updated'], 'integer'],
            [['tournament_name'], 'string'],
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
            'category_id' => 'категории спорта, тип  id  из донора ',
            'sport_id' => 'sport id  из донора ',
            'tournament_id' => 'tournament id  из донора ',
            'tournament_is_summaries' => 'tournament_is_summaries  не понятно ',
            'tournament_name' => 'Название tournament ',
            'status' => '1 активная 0 не активная',
            'sort' => 'sort 0 1 2 3..',
            'is_updated' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',
        ];
    }
}
