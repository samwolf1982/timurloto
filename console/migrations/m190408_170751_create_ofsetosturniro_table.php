<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ofsetosturniro`.
 */
class m190408_170751_create_ofsetosturniro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ofsetosturniro', [
            'id' => $this->primaryKey(),
            'id' => $this->string()->comment(''),
            'id' => $this->primaryKey(),
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ofsetosturniro');
    }
}
