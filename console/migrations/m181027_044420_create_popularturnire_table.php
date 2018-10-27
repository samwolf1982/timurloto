<?php

use yii\db\Migration;

/**
 * Handles the creation of table `popularturnire`.
 */
class m181027_044420_create_popularturnire_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('popularturnire', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment("Перезаписываемое значение"),
            'country_id_id' => $this->integer()->notNull()->comment('ид cтраны, как родитель'),
            'selected_turnire_id' => $this->integer()->notNull()->comment('ид Название турнира'),
            'sort' => $this->integer()->comment('сортировка'),
            'status' => $this->integer()->comment('статус'),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('popularturnire');
    }
}
