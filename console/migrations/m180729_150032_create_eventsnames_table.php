<?php

use yii\db\Migration;

/**
 * Handles the creation of table `eventsnames`.
 */
class m180729_150032_create_eventsnames_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('eventsnames', [
            'id' => $this->primaryKey(),

            'event_id' => $this->integer()->null()->comment("event id   по нему идет запрос  по ставкам "),

            'tournament_id' => $this->integer()->null()->comment("tournament id   доп поле по какому идет запрос использовать в фронте из парсера не приходит "),

            'event_name' => $this->text()->null()->comment("event name"),
            'event_dt' => $this->integer()->null()->comment("event_dt не понятно"),
            'event_status_type' => $this->text()->null()->comment("event статус"),
            'category_id' => $this->integer()->null()->comment("категории спорта, тип  id  из донора "),
            'category_name' => $this->text()->null()->comment("Название events "),
            'country_id' => $this->integer()->null()->comment("country_id id  из донора "),
            'tournament_name' => $this->text()->null()->comment("Название турнира "),
            'tournament_is_summaries' => $this->boolean()->null()->comment("tournament_is_summaries  наверно статус или закончен"),

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
        $this->dropTable('eventsnames');
    }
}
