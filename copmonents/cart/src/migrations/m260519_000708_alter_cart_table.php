<?php

use yii\db\Migration;

class m260519_000708_alter_cart_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%cart}}', 'tmp_user_id', $this->string(55)->null() . ' AFTER `user_id`');
        $this->addColumn('{{%cart}}', 'current_coefficient', $this->integer()->notNull() . ' AFTER `tmp_user_id`');

        $this->createIndex('tmp_user_id', '{{%cart}}', 'tmp_user_id');
    }

    public function down()
    {
        $this->dropColumn('{{%cart}}', 'tmp_user_id');
        $this->dropColumn('{{%cart}}', 'current_coefficient');
    }
}
