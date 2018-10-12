<?php

namespace app\models;

//use dvizh\cart\interfaces\CartElement;
//use dvizh\cart\interfaces\CartElement as CC;
//use dvizh\cart\interfaces\CartElement;


use dvizh\cart\interfaces\CartElement;
use Yii;

/**
 * This is the model class for table "typegamename".
 *
 * @property int $id
 * @property string $name Вид спорта
 * @property string $line Линия
 *
 * @property Typegame[] $typegames
 */
class Typegamename extends \yii\db\ActiveRecord implements \dvizh\cart\interfaces\CartElement
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typegamename';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'line'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Вид спорта',
            'line' => 'Линия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypegames()
    {
        return $this->hasMany(Typegame::className(), ['id_typegamename' => 'id']);
    }



    public function getCartId()
    {
        // TODO: Implement getCartId() method.
        return $this->id;
    }

    public function getCartName()
    {
        // TODO: Implement getCartName() method.
        return $this->name;
    }

    public function getCartPrice()
    {
        // TODO: Implement getCartPrice() method.
        return 111;
    }

    public function getCartOptions()
    {
        // TODO: Implement getCartOptions() method.
        return [
            '1' => [
                'name' => 'Цвет',
                'variants' => ['1' => 'Красный', '2' => 'Белый', '3' => 'Синий'],
            ],
            '2' => [
                'name' => 'Размер',
                'variants' => ['4' => 'XL', '5' => 'XS', '6' => 'XXL'],
            ]
        ];
    }
}
