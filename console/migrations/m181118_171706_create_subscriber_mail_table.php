<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscriber_mail`.
 */
class m181118_171706_create_subscriber_mail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscriber_mail', [
            'id' => $this->primaryKey(),
            'user_own_id' => $this->integer()->comment("ид пользователя"),
            'user_sub_id' => $this->integer()->comment("ид подписчика"),
            'expired_at' => $this->dateTime()->comment("время окончания"),
            'status' => $this->integer()->comment("статус блокирован активен прострочено время ..."),
            'text' => $this->text()->comment("Кометарий пользователя"), //  пока что не использую
            'created_at' => $this->dateTime()->comment("создан"),
        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscriber_mail');
    }
}
