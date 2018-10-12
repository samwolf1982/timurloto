<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bets`.
 */
class m180801_104714_create_bets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bets', [
            'id' => $this->primaryKey(),

            'event_id' => $this->integer()->null()->comment("event id "),
            'market_id' => $this->integer()->null()->comment("market_id  не понятно"),
            'market_name' => $this->text()->null()->comment("market_name название для групы например фора тотал ..."),
            'market_order' => $this->text()->null()->comment("market_order идентификатор донора возможно"),

            'outcomes' => $this->text()->null()->comment("outcomes JSON строка коофициентов"),

            'market_suspend' => $this->boolean()->null()->comment("неясно "),
            'market_template_id' => $this->integer()->null()->comment("неясно "),
            'market_template_view_id' => $this->integer()->null()->comment("неясно "),
            'market_template_weigh' => $this->integer()->null()->comment("неясно "),

            'result_type_id' => $this->integer()->null()->comment("неясно "),
            'result_type_name' => $this->string(255)->null()->comment("имя результата "),
            'result_type_short_name' => $this->string(255)->null()->comment("имя результата короткое"),

            'result_type_weigh' => $this->integer()->null()->comment("неясно"),

            'service_id' => $this->integer()->null()->comment("service_id"),
            'sport_id' => $this->integer()->null()->comment("sport_id"),


            'status' => $this->integer()->null()->comment("1 активная 0 не активная"),
            'sort' => $this->integer()->null()->comment("sort 0 1 2 3.."),
            'is_updated' => $this->integer()->null()->comment("обновлять ли категорию из парсера,следить 1-yes 0-no"),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bets');
    }
}
