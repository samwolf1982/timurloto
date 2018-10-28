<?php

use yii\db\Migration;

/**
 * Handles the creation of table `openedbet`.
 */
class m181028_071613_create_openedbet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('openedbet', [
            'id' => $this->primaryKey(),
            'bet_id' => $this->integer()->comment('ид ставки пользователя A'),
            'user_id' => $this->integer()->comment("ид пользователя B кому разрешено смотреть, он же и подписчик"),
            'created_at' => $this->dateTime()->comment("время создания"),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('openedbet');
    }
}
