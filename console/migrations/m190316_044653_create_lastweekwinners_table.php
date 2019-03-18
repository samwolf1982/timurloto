<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lastweekwinners`.
 */
class m190316_044653_create_lastweekwinners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('lastweekwinners', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer()->notNull()->comment('id пользователя'),
            'sort' => $this->integer()->notNull()->comment('сортировка'),
            'status' => $this->integer()->notNull()->comment('статус'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('lastweekwinners');
    }
}
