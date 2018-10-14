<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bets".
 *
 * @property int $id
 * @property int $event_id event id 
 * @property int $market_id market_id  не понятно
 * @property string $market_name market_name название для групы например фора тотал ...
 * @property string $market_order market_order идентификатор донора возможно
 * @property string $outcomes outcomes JSON строка коофициентов
 * @property int $market_suspend неясно 
 * @property int $market_template_id неясно 
 * @property int $market_template_view_id неясно 
 * @property int $market_template_weigh неясно 
 * @property int $result_type_id неясно 
 * @property string $result_type_name имя результата 
 * @property string $result_type_short_name имя результата короткое
 * @property int $result_type_weigh неясно
 * @property int $service_id service_id
 * @property int $sport_id sport_id
 * @property int $status 1 активная 0 не активная
 * @property int $sort sort 0 1 2 3..
 * @property int $is_updated обновлять ли категорию из парсера,следить 1-yes 0-no
 */
class Bets extends \yii\db\ActiveRecord implements \dvizh\cart\interfaces\CartElement
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'market_id', 'market_template_id', 'market_template_view_id', 'market_template_weigh', 'result_type_id', 'result_type_weigh', 'service_id', 'sport_id', 'status', 'sort', 'is_updated','count_outcomes'], 'integer'],
            [['market_name', 'market_order', 'outcomes'], 'string'],
            [['market_suspend'], 'string', 'max' => 1],
            [['result_type_name', 'result_type_short_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'event id ',
            'market_id' => 'market_id  не понятно',
            'market_name' => 'market_name название для групы например фора тотал ...',
            'market_order' => 'market_order идентификатор донора возможно',
            'outcomes' => 'outcomes JSON строка коофициентов',
            'count_outcomes' => 'Количество из json outcomes',
            'market_suspend' => 'неясно ',
            'market_template_id' => 'неясно ',
            'market_template_view_id' => 'неясно ',
            'market_template_weigh' => 'неясно ',
            'result_type_id' => 'неясно ',
            'result_type_name' => 'имя результата ',
            'result_type_short_name' => 'имя результата короткое',
            'result_type_weigh' => 'неясно',
            'service_id' => 'service_id',
            'sport_id' => 'sport_id',
            'status' => '1 активная 0 не активная',
            'sort' => 'sort 0 1 2 3..',
            'is_updated' => 'обновлять ли категорию из парсера,следить 1-yes 0-no',
        ];
    }

    public function getCartId()
    {
        // TODO: Implement getCartId() method.
        return $this->id;

    }

    public function getCartName()
    {
        // TODO: Implement getCartName() method.
        return 'Some name';
    }

    public function getCartPrice()
    {
        // TODO: Implement getCartPrice() method.
        return 999;
    }

    public function getPlayerfullname()
    {

        return $this->hasOne(Eventsnames::className(), ['event_id' => 'event_id']);

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
