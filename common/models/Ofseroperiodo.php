<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ofseroperiodo".
 *
 * @property int $id
 * @property string $period_name исход название
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
            [['period_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'period_name' => 'исход название',
        ];
    }
}
