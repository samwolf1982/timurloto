<?php

use yii\db\Migration;

/**
 * Handles the creation of table `centerturnire`.
 */
class m190318_094220_create_centerturnire_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('centerturnire', [
            'id' => $this->primaryKey(),
            'sportid' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->integer(),
            'name' => $this->text(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('centerturnire');
    }
}
