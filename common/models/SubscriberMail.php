<?php

namespace common\models;

use Yii;



/**
 * This is the model class for table "subscriber_mail".
 *
 * @property int $id
 * @property int $user_own_id ид пользователя
 * @property int $user_sub_id ид подписчика
 * @property string $expired_at время окончания
 * @property int $status статус блокирован активен прострочено время ...
 * @property string $created_at создан
 */
class SubscriberMail extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriber_mail';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_own_id', 'user_sub_id', 'status'], 'integer'],
            [['text'], 'string'],
            [['expired_at', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_own_id' => 'ид пользователя',
            'user_sub_id' => 'ид подписчика',
            'expired_at' => 'время окончания',
            'status' => 'статус блокирован активен прострочено время ...',
            'text' => "Кометарий пользователя",
            'created_at' => 'создан',
        ];
    }
}
