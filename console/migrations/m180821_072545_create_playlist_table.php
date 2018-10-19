<?php

use yii\db\Migration;

/**
 * Handles the creation of table `playlist`.
 */
class m180821_072545_create_playlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('playlist', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->comment('user id'),
            'name'=>$this->string(255)->comment('название плейлиста'),
            'sort'=>$this->integer()->comment('sort'),
            'status'=>$this->integer()->comment('cтатус 1 включено(давать по умолнчани) 0 отключено'),
            'is_default'=>$this->integer()->comment('плейлист по умолчанию 1 - 0 '),
            'created_at'=>$this->dateTime()->comment('время создания'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('playlist');
    }
}
