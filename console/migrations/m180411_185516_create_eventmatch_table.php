<?php

use yii\db\Migration;

/**
 * Handles the creation of table `eventmatch`.
 */
class m180411_185516_create_eventmatch_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {        return true;
        $this->createTable('match', [
            'id' => $this->primaryKey(),
            'status'=>$this->integer()->defaultValue(1)->comment('cтатус (1 открыто 2 закрыто)'),
            'id_typegame'=>$this->integer()->notNull()->comment('Вид спорта'), // typegame дублируется или здесь или в championship и в team хотя можно и везде держать тип игры для поиска
            'id_championship'=>$this->integer()->notNull()->comment('Чемпионат'), // championship
            'result'=>$this->string()->null()->comment('Результат'),

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
