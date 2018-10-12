<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turnire".
 *
 * @property int $id
 * @property int $id_turnirename Название турнира
 * @property int $status Cостояние турнира 1 открыт 2 закрыт
 *
 * @property Game[] $games
 * @property Turnirename $turnirename
 * @property Typegame[] $typegames
 */
class Turnire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turnire';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_turnirename'], 'required'],
            [['id_turnirename', 'status'], 'integer'],
            [['id_turnirename'], 'exist', 'skipOnError' => true, 'targetClass' => Turnirename::className(), 'targetAttribute' => ['id_turnirename' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_turnirename' => 'Название турнира',
            'status' => 'Cостояние турнира 1 открыт 2 закрыт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::className(), ['id_turnire' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnirename()
    {
        return $this->hasOne(Turnirename::className(), ['id' => 'id_turnirename']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypegames()
    {
        return $this->hasMany(Typegame::className(), ['id_turnire' => 'id']);
    }
}
