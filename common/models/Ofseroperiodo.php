<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ofseroperiodo".
 *
 * @property int $id
 * @property string $period_id спорт ид
 * @property string $created_at время начала
 */
class Ofseroperiodo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ofseroperiodo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['period_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'period_id' => 'спорт ид',
            'created_at' => 'время начала',
        ];
    }
}
