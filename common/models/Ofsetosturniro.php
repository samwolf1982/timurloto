<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ofsetosturniro".
 *
 * @property int $id
 * @property string $sport_id спорт ид
 * @property string $turnir_id турнир ид
 * @property int $status status
 */
class Ofsetosturniro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ofsetosturniro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['sport_id', 'turnir_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sport_id' => 'спорт ид',
            'turnir_id' => 'турнир ид',
            'status' => 'status',
        ];
    }
}
