<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sesionbd`.
 */
class m181213_042448_create_sesionbd_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('session', [
            'id' => $this->primaryKey(),
            'expire' => $this->integer(),
            'data' => $this->binary(),

        ]);
    }





    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('session');
    }

}
