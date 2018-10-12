<?php

use yii\db\Migration;

/**
 * Handles the creation of table `turnire`.
 */
class m180411_201858_create_turnire_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('turnire', [
            'id' => $this->primaryKey(),
            'id_turnirename'=>$this->integer()->notNull()->comment('Название турнира'),
          //  'id_game'=>$this->integer()->notNull()->comment('Игра'),
            'status'=>$this->integer()->defaultValue(1)->comment('Cостояние турнира 1 открыт 2 закрыт'),

            ]);
        // связи
        // добавить связь.
        $this->addForeignKey('id_turnirename_turnire_id_turnirename_fk', '{{%turnire%}}', 'id_turnirename', '{{%turnirename%}}', 'id', 'NO ACTION', 'CASCADE');
      //  $this->addForeignKey('id_game_turnire_id_turnirename_fk', '{{%turnire%}}', 'id_game', '{{%game%}}', 'id', 'NO ACTION', 'CASCADE');



        $faker = Faker\Factory::create();
        $p=[];

        foreach ( range(1,10000) as $k=>$v){
           // $p[]= [$faker->numberBetween(1,1000),$faker->numberBetween(1,50000),$faker->numberBetween(1,2)];
            $p[]= [$faker->numberBetween(1,1000),$faker->numberBetween(1,2)];
        }

       // $this->batchInsert('turnire',['id_turnirename','id_game','status'],$p);
        $this->batchInsert('turnire',['id_turnirename','status'],$p);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('turnire');
    }
}
