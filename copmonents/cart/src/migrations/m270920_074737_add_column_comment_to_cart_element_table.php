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
        $this->addColumn('{{%cart_element}}', 'current_market_name', $this->string(255)->null());
        $this->addColumn('{{%cart_element}}', 'result_type_name', $this->string(255)->null());
        $this->addColumn('{{%cart_element}}', 'gamers_name', $this->string(255)->null()); //кто играет название


    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%cart_element}}', 'comment');
        $this->dropColumn('{{%cart_element}}', 'current_market_name');
        $this->dropColumn('{{%cart_element}}', 'result_type_name');
        $this->dropColumn('{{%cart_element}}', 'gamers_name');
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
