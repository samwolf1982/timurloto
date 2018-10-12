<?php

use yii\db\Migration;

/**
 * Handles the creation of table `team2`.
 */
class m180415_213020_create_team2_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('team', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Название команды'),
            //'id_typegame' => $this->integer()->notNull()->comment('Тип игры'), // 1-37 faker
            'country' => $this->string()->null()->comment('Страна'),
            'clubname' => $this->string()->null()->comment('Название клуба'),
            'label' => $this->string()->null()->comment('метка для чемпионата'),
        ]);

        $faker = Faker\Factory::create();
        $p=[];
        foreach ( range(1,50000) as $k=>$v){
            $p[]= [$faker->name.' ( Team )','ua (не обязательно)','Club name (не обязательно)','some info (не обязательно)'];
        }

        $this->batchInsert('team',['name','country','clubname','label'],$p);






    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('team');
    }
}
