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
            'period_id' => $this->string()->comment('спорт ид'),
            'created_at' => $this->dateTime()->comment("время начала"),
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
