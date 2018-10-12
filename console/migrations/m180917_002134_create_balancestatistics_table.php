<?php

use yii\db\Migration;

/**
 * Handles the creation of table `balancestatistics`.
 */
class m180917_002134_create_balancestatistics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('balancestatistics', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'wager_id' => $this->integer()->notNull(),
            'playlist_id' => $this->integer()->notNull(),
            'event_id'=>$this->integer()->notNull(),
            'profit' => $this->money()->notNull()->comment('Прибыль'),
            'penetration' => $this->integer()->notNull()->comment('Проходимость'),
            'middle_coef' => $this->float()->notNull()->comment('коэффициент'),
            'roi' => $this->float()->notNull()->comment('ROI'),
            'plus' => $this->integer()->notNull()->comment('Количество Плюсов'),
            'minus' => $this->integer()->notNull()->comment('Количество Минусов'),
            'created_at'=>$this->dateTime()->notNull()->comment('created at'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('balancestatistics');
    }
}
