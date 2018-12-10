<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_avatars`.
 */
class m181127_080122_create_user_avatars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_avatars', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer()->notNull()->comment('id пользователя'),
            'avatar' => $this->text()->comment('path to image'),
        ]);
        $this->createTable('user_attachment_info', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer()->notNull()->comment('id пользователя'),
            'about_me' => $this->text()->comment('описание про человека '),
        ]);
    }




    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_avatars');
        $this->dropTable('user_attachment_info');
    }
}
