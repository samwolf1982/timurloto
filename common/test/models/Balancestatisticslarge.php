<?php

namespace common\test\models;

use Yii;

/**
 * This is the model class for table "balancestatisticslarge".
 *
 * @property int $id
 * @property int $user_id
 * @property int $wager_id
 * @property int $playlist_id
 * @property int $event_id
 * @property string $profit Прибыль
 * @property int $penetration Проходимость
 * @property double $middle_coef коэффициент
 * @property double $roi ROI
 * @property int $plus Количество Плюсов
 * @property int $minus Количество Минусов
 * @property string $created_at created at
 * @property string $created_own
 */
class Balancestatisticslarge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balancestatisticslarge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'wager_id', 'playlist_id', 'event_id', 'profit', 'penetration', 'middle_coef', 'roi', 'plus', 'minus', 'created_at'], 'required'],
            [['user_id', 'wager_id', 'playlist_id', 'event_id', 'penetration', 'plus', 'minus'], 'integer'],
            [['profit', 'middle_coef', 'roi'], 'number'],
            [['created_at', 'created_own'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'wager_id' => 'Wager ID',
            'playlist_id' => 'Playlist ID',
            'event_id' => 'Event ID',
            'profit' => 'Прибыль',
            'penetration' => 'Проходимость',
            'middle_coef' => 'коэффициент',
            'roi' => 'ROI',
            'plus' => 'Количество Плюсов',
            'minus' => 'Количество Минусов',
            'created_at' => 'created at',
            'created_own' => 'Created Own',
        ];
    }
}
