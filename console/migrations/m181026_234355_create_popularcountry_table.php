<?php

use yii\db\Migration;

/**
 * Handles the creation of table `popularcountry`.
 */
class m181026_234355_create_popularcountry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('popularcountry', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment("Перезаписываемое значение"),
            'sport_id' => $this->integer()->notNull()->comment('ид спорта, как родитель'),
            'selected_country_id' => $this->integer()->notNull()->comment('ид Название страны'),
//            'tournament_id_f' => $this->integer()->notNull()->comment('ид турнира первое поле'),
//            'tournament_id' => $this->integer()->notNull()->comment('ид турнира еще не ясно'),
//            'category_id' => $this->integer()->notNull()->comment('ид категории еще не ясно'),
            //'tournament_name' => $this->integer()->notNull()->comment('ид спорта из таблицы sportcategorynames'),
          //  'tournament_name' => $this->string()->comment('название страны'),
            'sort' => $this->integer()->comment('сортировка'),
            'status' => $this->integer()->comment('статус'),


            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('popularcountry');
    }
}
