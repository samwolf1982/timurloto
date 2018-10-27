<?php

namespace common\models;

use common\models\wraps\SportcategoryExt;
use Yii;

/**
 * This is the model class for table "popularcountry".
 *
 * @property int $id
 * @property string $name Перезаписываемое значение
 * @property int $sport_id ид спорта, как родитель
 * @property int $selected_country_id ид Название страны
 * @property int $sort сортировка
 * @property int $status статус
 */
class Popularcountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'popularcountry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sport_id', 'selected_country_id'], 'required'],
            [['sport_id', 'selected_country_id', 'sort', 'status'], 'integer'],
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
            'name' => 'Перезаписываемое значение',
            'sport_id' => 'ид спорта, как родитель',
            'selected_country_id' => 'ид Название страны',
            'sort' => 'сортировка',
            'status' => 'статус',
        ];
    }

    public function getRelturnire()
    {
        return $this->hasOne(SportcategoryExt::className(), ['category_id' => 'selected_country_id']);
      //  return $this->hasOne(Sportcategorynames::className(), ['sport_id' => 'sport_id']);
    }


    public function getRelsport()
    {
          return $this->hasOne(Sportcategorynames::className(), ['sport_id' => 'sport_id']);
    }

    public function getRelturnirewiget() // связь по виджету
    {
        return $this->hasMany(Popularturnire::className(), ['country_id_id' => 'selected_country_id']);
    }




}
