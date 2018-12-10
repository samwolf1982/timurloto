<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_avatars".
 *
 * @property int $id
 * @property int $uid id пользователя
 * @property string $avatar path to image
 */
class UserAvatars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_avatars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid'], 'integer'],
            [['avatar'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'id пользователя',
            'avatar' => 'path to image',
        ];
    }
}
