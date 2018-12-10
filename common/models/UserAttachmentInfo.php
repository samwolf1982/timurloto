<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_attachment_info".
 *
 * @property int $id
 * @property int $uid id пользователя
 * @property string $about_me описание про человека 
 */
class UserAttachmentInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_attachment_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid'], 'integer'],
            [['about_me'], 'string'],
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
            'about_me' => 'описание про человека ',
        ];
    }
}
