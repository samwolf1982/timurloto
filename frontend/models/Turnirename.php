<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turnirename".
 *
 * @property int $id
 * @property string $name Название турнира
 * @property string $info Дополнительная информация
 * @property string $time_start Время начала турнира
 *
 * @property Turnire[] $turnires
 */
class Turnirename extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turnirename';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['time_start'], 'safe'],
            [['name', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название турнира',
            'info' => 'Дополнительная информация',
            'time_start' => 'Время начала турнира',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnires()
    {
        return $this->hasMany(Turnire::className(), ['id_turnirename' => 'id']);
    }
}
