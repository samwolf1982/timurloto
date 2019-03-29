<?php

use yii\db\Migration;

/**
 * Handles the creation of table `centerturnire`.
 */
class m190318_094220_create_centerturnire_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (!$this->tableExists('centerturnire')){
            $this->createTable('centerturnire', [
                'id' => $this->primaryKey(),
                'sportid' => $this->text(),
                'sort' => $this->integer(),
                'status' => $this->integer(),
                'name' => $this->text(),

            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('centerturnire');
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
