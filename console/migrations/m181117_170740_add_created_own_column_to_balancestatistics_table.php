<?php

use yii\db\Migration;

/**
 * Handles adding created_own to table `balancestatistics`.
 */
class m181117_170740_add_created_own_column_to_balancestatistics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('balancestatistics', 'created_own', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('balancestatistics', 'created_own');
    }
}
