<?php

use yii\db\Migration;

/**
 * Handles the creation of table `popularwiget`.
 */
class m190320_023339_create_popularwiget_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (!$this->tableExists('popularwiget')){
            $this->createTable('popularwiget', [
                'id' => $this->primaryKey(),
                'logo' => $this->integer()->comment('логотип'),
                'sportname' => $this->text()->comment('название спорта'),
                'turnirename' => $this->text()->comment('название турнира'),
                'turnireid' => $this->text()->comment('ид турнира'),
                'sort' => $this->integer()->comment('сортировка'),
                'status' => $this->integer()->comment('статус'),
                'count' => $this->integer()->comment('количество'),

            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('popularwiget');
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
