<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sportcategory`.
 */
class m180729_101021_create_sportcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sportcategory', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->null()->comment("category id  из донора"),
            'category_is_summaries' => $this->boolean()->null()->comment("не понятно "),
            'category_name' => $this->text()->null()->comment("Название категории"),
            'sport_id' => $this->integer()->null()->comment("вид cпорт ид из донора"),
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
        $this->dropTable('sportcategory');
    }
}
