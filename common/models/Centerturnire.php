<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "centerturnire".
 *
 * @property int $id
 * @property string $sportid
 * @property int $sort
 * @property int $status
 */
class Centerturnire extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'centerturnire';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sportid','name'], 'string'],
            [['sort', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sportid' => 'Ид спорта',
            'sort' => 'Сортировка',
            'status' => 'Cтатус',
            'name' => 'Название',
        ];
    }
}
