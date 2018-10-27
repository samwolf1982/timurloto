<?php

use yii\db\Migration;

/**
 * Handles the creation of table `popularsport`.
 */
class m181026_205535_create_popularsport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('popularsport', [
            'id' => $this->primaryKey(),
            'sport_id' => $this->integer()->notNull()->comment('ид спорта из таблицы sportcategorynames'),
            'name' => $this->string()->comment('название спорта'),
            'sort' => $this->integer()->comment('сортировка'),
            'status' => $this->integer()->comment('статус'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('popularsport');
    }
}
