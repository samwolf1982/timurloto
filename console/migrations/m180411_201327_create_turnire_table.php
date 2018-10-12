<?php

use yii\db\Migration;

/**
 * Handles the creation of table `turnire`.
 */
class m180411_201327_create_turnire_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('turnirename', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()->comment('Название чемпионата'),
            'info'=>$this->string()->null()->comment('Дополнительная информация'),
            'time_start' => $this->dateTime()->null()->comment('Время начала турнира'),
        ]);


        $faker = Faker\Factory::create();
        $p=[];

        foreach ( range(1,1000) as $k=>$v){
            $dt=$faker->dateTimeBetween("-1 years","+1 years");
            $p[]= [$faker->name().' (Название Чемпионата)',$faker->name().' (доп. инфо)', date ("Y-m-d H:i:s", $dt->getTimestamp() ) ];
        }


        $this->batchInsert('turnirename',['name','info','time_start'],$p);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('turnirename');
    }
}
