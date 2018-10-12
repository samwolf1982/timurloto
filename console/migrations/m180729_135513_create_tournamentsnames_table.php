<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tournamentsnames`.
 */
class m180729_135513_create_tournamentsnames_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tournamentsnames', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->null()->comment("категории спорта, тип  id  из донора "),
            'sport_id' => $this->integer()->null()->comment("sport id  из донора "),
            'tournament_id' => $this->integer()->null()->comment("tournament id  из донора "),
            'tournament_is_summaries' => $this->boolean()->null()->comment("tournament_is_summaries  не понятно "),
            'tournament_name' => $this->text()->null()->comment("Название tournament "),
            //'tournament_weigh' => $this->integer()->null()->comment("не понятно"),
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
        $this->dropTable('tournamentsnames');
    }
}
