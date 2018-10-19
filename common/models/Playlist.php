<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "playlist".
 *
 * @property int $id
 * @property int $user_id user id
 * @property string $name название плейлиста
 * @property int $sort sort
 * @property int $status cтатус 1 включено(давать по умолнчани) 0 отключено
 * @property string $created_at время создания
 */
class Playlist extends \yii\db\ActiveRecord
{


    const STATUS_ON=1;
    const STATUS_OFF=0;
    const LIMIT=5;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'sort', 'status','is_default'], 'integer'],
            [['created_at'], 'safe'],
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
            'user_id' => 'user id',
            'name' => 'название плейлиста',
            'sort' => 'sort',
            'status' => 'cтатус 1 включено(давать по умолнчани) 0 отключено',
            'is_default' => 'плейлист по умолняанию',
            'created_at' => 'время создания',
        ];
    }



}
