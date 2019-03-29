<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lastweekwinners`.
 */
class m190316_044653_create_lastweekwinners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        if (!$this->tableExists('lastweekwinners')){
            $this->createTable('lastweekwinners', [
                'id' => $this->primaryKey(),
                'uid' => $this->integer()->notNull()->comment('id пользователя'),
                'sort' => $this->integer()->notNull()->comment('сортировка'),
                'status' => $this->integer()->notNull()->comment('статус'),
            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('lastweekwinners');
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
