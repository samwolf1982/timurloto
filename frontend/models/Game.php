<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property int $status Cостояние игры 1 открыта 2 закрыта
 * @property int $id_turnire Ид турнира
 * @property int $id_team_a Команда (а)
 * @property int $id_team_b Команда (б)
 * @property string $time_game Время проведения
 * @property string $game_result Результат
 *
 * @property Team $teamA
 * @property Team $teamB
 * @property Turnire $turnire
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'id_turnire', 'id_team_a', 'id_team_b'], 'integer'],
            [['id_turnire', 'id_team_a', 'id_team_b'], 'required'],
            [['time_game'], 'safe'],
            [['game_result'], 'string', 'max' => 255],
            [['id_team_a'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['id_team_a' => 'id']],
            [['id_team_b'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['id_team_b' => 'id']],
            [['id_turnire'], 'exist', 'skipOnError' => true, 'targetClass' => Turnire::className(), 'targetAttribute' => ['id_turnire' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Cостояние игры 1 открыта 2 закрыта',
            'id_turnire' => 'Ид турнира',
            'id_team_a' => 'Команда (а)',
            'id_team_b' => 'Команда (б)',
            'time_game' => 'Время проведения',
            'game_result' => 'Результат',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamA()
    {
        return $this->hasOne(Team::className(), ['id' => 'id_team_a']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamB()
    {
        return $this->hasOne(Team::className(), ['id' => 'id_team_b']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnire()
    {
        return $this->hasOne(Turnire::className(), ['id' => 'id_turnire']);
    }
}
