<?php

use yii\db\Migration;

/**
 * Handles the creation of table `match`.
 */
class m180411_150105_create_match_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return true;
        $this->createTable('match', [
            'id' => $this->primaryKey(),
            'teama'=>$this->string()->notNull()->comment('Команда 1'),
            'teamb'=>$this->string()->notNull()->comment('Команда 2'),
        ]);

        $faker = Faker\Factory::create();


        $p=[];
        foreach ( range(1,1000) as $k=>$v){
            $p[]= [$faker->name .' Team a',$faker->name.' Team b'];
        }
        $this->batchInsert('match',['teama','teamb'],$p);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
        $this->dropTable('match');
    }
}
