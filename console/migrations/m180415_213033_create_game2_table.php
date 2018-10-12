<?php

use yii\db\Migration;

/**
 * Handles the creation of table `game2`.
 */
class m180415_213033_create_game2_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('game', [
            'id' => $this->primaryKey(),
            'status'=>$this->integer()->defaultValue(1)->comment('Cостояние игры 1 открыта 2 закрыта'),
            'id_turnire'=>$this->integer()->notNull()->comment('Ид турнира'),
            'id_team_a'=>$this->integer()->notNull()->comment('Команда (а)'),
            'id_team_b'=>$this->integer()->notNull()->comment('Команда (б)'),
            'time_game' => $this->dateTime()->null()->comment('Время проведения'),
            'game_result' => $this->string()->null()->comment('Результат'),
            //'name' => $this->string()->notNull()->comment('Название команды'),
            //'id_typegame' => $this->integer()->notNull()->comment('Тип игры'), // 1-37 faker
        ]);


        // связи
        // добавить связь.
        $this->addForeignKey('id_team_a_game_id_team_fk', '{{%game%}}', 'id_team_a', '{{%team%}}', 'id', 'NO ACTION', 'CASCADE');
        $this->addForeignKey('id_team_b_game_id_team_fk', '{{%game%}}', 'id_team_b', '{{%team%}}', 'id', 'NO ACTION', 'CASCADE');
        //1-100000
        $this->addForeignKey('id_turnire_game_id_turnire_fk', '{{%game%}}', 'id_turnire', '{{%turnire%}}', 'id', 'NO ACTION', 'CASCADE');


        $faker = Faker\Factory::create();
        $p=[];

        foreach ( range(1,200000) as $k=>$v){
            $dt=$faker->dateTimeBetween("-1 years","+1 years");
            $p[]= [$faker->numberBetween(1,10000),$faker->numberBetween(1,50000),$faker->numberBetween(1,50000), date ("Y-m-d H:i:s", $dt->getTimestamp() ),'Результат игры (не обязательно)'  ];
        }


        $this->batchInsert('game',['id_turnire','id_team_a','id_team_b','time_game','game_result'],$p);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('game');
    }
}
