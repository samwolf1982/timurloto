<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ofseroperiodo`.
 */
class m190409_202216_create_ofseroperiodo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ofseroperiodo', [
            'id' => $this->primaryKey(),
            'period_name' => $this->string()->comment('исход название'),
           // 'created_at' => $this->dateTime()->comment("время начала"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ofseroperiodo');
    }
}
