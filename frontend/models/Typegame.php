<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "typegame".
 *
 * @property int $id
 * @property int $id_typegamename Вид спорта
 * @property int $id_turnire Турнир
 *
 * @property Turnire $turnire
 * @property Typegamename $typegamename
 */
class Typegame extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typegame';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_typegamename', 'id_turnire'], 'required'],
            [['id_typegamename', 'id_turnire'], 'integer'],
            [['id_turnire'], 'exist', 'skipOnError' => true, 'targetClass' => Turnire::className(), 'targetAttribute' => ['id_turnire' => 'id']],
            [['id_typegamename'], 'exist', 'skipOnError' => true, 'targetClass' => Typegamename::className(), 'targetAttribute' => ['id_typegamename' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_typegamename' => 'Вид спорта',
            'id_turnire' => 'Турнир',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnire()
    {
        return $this->hasOne(Turnire::className(), ['id' => 'id_turnire']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypegamename()
    {
        return $this->hasOne(Typegamename::className(), ['id' => 'id_typegamename']);
    }
}
