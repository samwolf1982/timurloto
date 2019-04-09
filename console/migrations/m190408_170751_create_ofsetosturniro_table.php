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
            'sport_id' => $this->string()->comment('спорт ид'),
            'turnir_id' => $this->string()->comment('турнир ид'),
            'status' => $this->integer()->comment('status'),
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
