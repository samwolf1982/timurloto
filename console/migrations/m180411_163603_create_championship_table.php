<?php

use yii\db\Migration;

/**
 * Handles the creation of table `championship`.
 */
class m180411_163603_create_championship_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return true;
        if ($this->tableExists('championship')){
            $this->dropTable('championship');
        }


        $this->createTable('championship', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Название турнира'),
            'id_teama' => $this->integer()->notNull()->comment('Команда 1'), // 1-37 faker
            'id_teamb' => $this->string()->null()->comment('Команда 2'),
            //'time_game' => $this->date()->null()->comment('Время проведения') ,

            'time_game' => $this->dateTime()->null()->comment('Время проведения'),
            //'time_game3' => $this->time()->null()->comment('Время проведения3'),
        ]);


        // добавить связь.   две не работают
      //  $this->addForeignKey('id_teama_championship_id_team_fk', '{{%championship}}', 'id_teama', '{{%team}}', 'id', 'NO ACTION', 'CASCADE');
        ////  $this->addForeignKey('id_teamb_championship_id_team_fk', '{{%championship}}', 'id_teamb', '{{%team}}', 'id', 'NO ACTION', 'CASCADE');



        $faker = Faker\Factory::create();
        $p=[];

        foreach ( range(1,50000) as $k=>$v){
            $dt=$faker->dateTimeBetween("-1 years","+1 years");
            $p[]= [$faker->name.' ( championship )',$faker->numberBetween(1,50000),$faker->numberBetween(1,50000), date ("Y-m-d H:i:s", $dt->getTimestamp() )  ];
        }


        $this->batchInsert('championship',['name','id_teama','id_teamb','time_game'],$p);








    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {        return true;
        $this->dropTable('championship');
    }

    private function tableExists($tableName, $db = null)
    {
        if ($db)
            $dbConnect = \Yii::$app->get($db);
        else
            $dbConnect = \Yii::$app->get('db');

        if (!($dbConnect instanceof \yii\db\Connection))
            throw new \yii\base\InvalidParamException;

        return in_array($tableName, $dbConnect->schema->getTableNames());
    }

}
