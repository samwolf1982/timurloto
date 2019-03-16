<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sesionbd`.
 */
class m181213_042448_create_sesionbd_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->tableExists('session')){
            $this->dropTable('session');
        }
        $this->createTable('session', [
            'id' => $this->primaryKey(),
            'expire' => $this->integer(),
            'data' => $this->binary(),

        ]);
    }




    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('session');
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
