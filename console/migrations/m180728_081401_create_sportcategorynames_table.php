<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sportcategorynames`.
 */
class m180728_081401_create_sportcategorynames_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sportcategorynames', [
            'id' => $this->primaryKey(),
            'sport_id' => $this->integer()->null()->comment("sport id  из донора по нему связб с sportcategory"),
            'sport_name' => $this->text()->null()->comment("Название спорта"),
            'sport_short_name' => $this->text()->null()->comment("Название спорта короткое"),
            'sport_slug' => $this->text()->null()->comment("slug"),
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
        $this->dropTable('sportcategorynames');
    }
}
