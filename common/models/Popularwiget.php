<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "popularwiget".
 *
 * @property int $id
 * @property int $logo логотип
 * @property string $sportname название спорта
 * @property string $turnirename название турнира
 * @property string $turnireid ид турнира
 * @property int $sort сортировка
 * @property int $status статус
 * @property int $count количество
 */
class Popularwiget extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'popularwiget';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logo', 'sort', 'status', 'count'], 'integer'],
            [['sportname', 'turnirename', 'turnireid'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => 'Logo',
            'sportname' => 'Название спорта',
            'turnirename' => 'Название турнира',
            'turnireid' => 'Ид турнира (из парсера)',
            'sort' => 'Sort',
            'status' => 'Status',
            'count' => 'Количество',
        ];
    }
}
