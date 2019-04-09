<?php

use yii\db\Migration;

/**
 * Class m190329_054203_newfiledintable
 */
class m190329_054203_newfiledintable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if(0){
            $this->addColumn('lastweekwinners', 'level', $this->string());
            $this->addColumn('lastweekwinners', 'period', $this->string());
        }

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('lastweekwinners', 'level');
        $this->dropColumn('lastweekwinners', 'period');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190329_054203_newfiledintable cannot be reverted.\n";

        return false;
    }
    */
}
