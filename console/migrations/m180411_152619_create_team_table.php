<?php

use yii\db\Migration;

/**
 * Handles the creation of table `team`.
 */
class m180411_152619_create_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return true;
if ($this->tableExists('team')){
    $this->dropTable('team');
}

        $this->createTable('team', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Название команды'),
            'id_typegame' => $this->integer()->notNull()->comment('Тип игры'), // 1-37 faker
            'country' => $this->string()->null()->comment('Страна'),
            'clubname' => $this->string()->null()->comment('Название клуба'),
            'label' => $this->string()->null()->comment('метка для чемпионата'),
        ]);


        // добавить связь.
        $this->addForeignKey('team_typegame_id_typegame_fk', '{{%team}}', 'id_typegame', '{{%typegame}}', 'id', 'NO ACTION', 'CASCADE');


        $faker = Faker\Factory::create();
        $p=[];
        foreach ( range(1,50000) as $k=>$v){
            $p[]= [$faker->name.' ( Team )',$faker->numberBetween(1,19),'ua','Club name'];
        }

        $this->batchInsert('team',['name','id_typegame','country','clubname'],$p);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
        $this->execute("SET foreign_key_checks = 0;");
        $this->truncateTable('team');
        $this->execute("SET foreign_key_checks = 1;");
        $this->dropTable('team');

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

//championship
