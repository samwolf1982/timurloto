<?php

namespace common\models;

use common\models\wraps\SportcategoryExt;
use common\models\wraps\TournamentsnamesExt;
use Yii;

/**
 * This is the model class for table "popularturnire".
 *
 * @property int $id
 * @property string $name Перезаписываемое значение
 * @property int $country_id_id ид cтраны, как родитель
 * @property int $selected_turnire_id ид Название турнира
 * @property int $sort сортировка
 * @property int $status статус
 */
class Popularturnire extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'popularturnire';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id_id', 'selected_turnire_id'], 'required'],
            [['country_id_id', 'selected_turnire_id', 'sort', 'status'], 'integer'],
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
            'country_id_id' => 'ид cтраны, как родитель',
            'selected_turnire_id' => 'ид Название турнира',
            'sort' => 'сортировка',
            'status' => 'статус',
        ];
    }


        public function getRelcountry()
    {
        return $this->hasOne(SportcategoryExt::className(), ['category_id' => 'country_id_id']);
        //  return $this->hasOne(Sportcategorynames::className(), ['sport_id' => 'sport_id']);
    }


    public function getRelturnire()
    {
        return $this->hasOne(TournamentsnamesExt::className(), ['tournament_id' => 'selected_turnire_id']);
        //  return $this->hasOne(Sportcategorynames::className(), ['sport_id' => 'sport_id']);
    }
//
//
//    public function getRelsport()
//    {
//        return $this->hasOne(Sportcategorynames::className(), ['sport_id' => 'sport_id']);
//    }

}
