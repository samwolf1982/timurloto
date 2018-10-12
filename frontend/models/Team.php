<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name Название команды
 * @property string $country Страна
 * @property string $clubname Название клуба
 * @property string $label метка для чемпионата
 *
 * @property Game[] $games
 * @property Game[] $games0
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'country', 'clubname', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название команды',
            'country' => 'Страна',
            'clubname' => 'Название клуба',
            'label' => 'метка для чемпионата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::className(), ['id_team_a' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames0()
    {
        return $this->hasMany(Game::className(), ['id_team_b' => 'id']);
    }
}
