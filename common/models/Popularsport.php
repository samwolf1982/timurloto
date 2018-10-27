<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "popularsport".
 *
 * @property int $id
 * @property int $sport_id ид спорта из таблицы sportcategorynames
 * @property string $name название спорта
 * @property int $sort сортировка
 * @property int $status статус
 */
class Popularsport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'popularsport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sport_id'], 'required'],
            [['sport_id', 'sort', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sport_id' => 'ид спорта из таблицы sportcategorynames',
            'name' => 'название спорта',
            'sort' => 'сортировка',
            'status' => 'статус',
        ];
    }


    public function getRelsport()
    {
        return $this->hasOne(Sportcategorynames::className(), ['sport_id' => 'sport_id']);
    }
}
