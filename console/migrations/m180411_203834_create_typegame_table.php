<?php

use yii\db\Migration;

/**
 * Handles the creation of table `typegame`.
 */
class m180411_203834_create_typegame_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('typegame', [
            'id' => $this->primaryKey(),
            'id_typegamename'=>$this->integer()->notNull()->comment('Вид спорта'),
            'id_turnire'=>$this->integer()->notNull()->comment('Турнир'),
        ]);

        // связи
        // добавить связь.
        $this->addForeignKey('id_typegamename_typegame_id_typegamename_fk', '{{%typegame%}}', 'id_typegamename', '{{%typegamename%}}', 'id', 'NO ACTION', 'CASCADE');
        $this->addForeignKey('id_turnire_typegame_id_typegamename_fk', '{{%typegame%}}', 'id_turnire', '{{%turnire%}}', 'id', 'NO ACTION', 'CASCADE');

        $faker = Faker\Factory::create();
        $p=[];
        foreach ( range(1,10000) as $k=>$v){
            $p[]= [$faker->numberBetween(1,19),$faker->numberBetween(1,10000)];
        }
        $this->batchInsert('typegame',['id_typegamename','id_turnire'],$p);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('typegame');
    }
}
