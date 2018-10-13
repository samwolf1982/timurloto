<?php

use yii\db\Migration;

/**
 * Class m170920_074737_add_column_comment_to_cart_element_table
 */
class m270920_074737_add_column_comment_to_cart_element_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%cart_element}}', 'comment', $this->string(255)->null());

        $this->addColumn('{{%cart_element}}', 'category_id', $this->integer()->null()); // ид категоии, не должны быть елементы из одной категории в одной корзине
        $this->addColumn('{{%cart_element}}', 'status', $this->integer()->null());  // статус отключить включить елементы в корзине

        $this->addColumn('{{%cart_element}}', 'position_id', $this->integer()->null());  // ид в базе, чтобы изебежать перебора

        $this->addColumn('{{%cart_element}}', 'main_cat_name', $this->string(255)->null());  // название главной категории
        $this->addColumn('{{%cart_element}}', 'cat_name', $this->string(255)->null());  // название суб категории
        $this->addColumn('{{%cart_element}}', 'name', $this->string(255)->null());  // имя матча
        $this->addColumn('{{%cart_element}}', 'name_full', $this->string(255)->null());  // имя матча
        $this->addColumn('{{%cart_element}}', 'coof', $this->float()->null());  //  кооф

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%cart_element}}', 'comment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170920_074737_add_column_comment_to_cart_element_table cannot be reverted.\n";

        return false;
    }
    */
}
