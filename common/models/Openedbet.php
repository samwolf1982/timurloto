<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "openedbet".
 *
 * @property int $id
 * @property int $bet_id ид ставки пользователя A
 * @property int $user_id ид пользователя B кому разрешено смотреть, он же и подписчик
 * @property string $created_at время создания
 */
class Openedbet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'openedbet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bet_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bet_id' => 'ид ставки пользователя A',
            'user_id' => 'ид пользователя B кому разрешено смотреть, он же и подписчик',
            'created_at' => 'время создания',
        ];
    }
}
