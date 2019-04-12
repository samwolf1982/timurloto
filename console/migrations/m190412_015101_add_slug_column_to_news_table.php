<?php

use yii\db\Migration;

/**
 * Handles adding slug to table `news`.
 */
class m190412_015101_add_slug_column_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news', 'slug', $this->string());
        $this->addColumn('news_category', 'slug', $this->string());


        $this->addColumn('news','h1',  $this->string());
        $this->addColumn('news','meta_title',  $this->string());
        $this->addColumn('news','meta_key',  $this->string());
        $this->addColumn('news','meta_desc',  $this->string());



        $this->addColumn('news_category','h1',  $this->string());
        $this->addColumn('news_category','meta_title',  $this->string());
        $this->addColumn('news_category','meta_key',  $this->string());
        $this->addColumn('news_category','meta_desc',  $this->string());


        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('news', 'slug');
        $this->dropColumn('news_category', 'slug');

        $this->dropColumn('news', 'h1');
        $this->dropColumn('news', 'meta_title');
        $this->dropColumn('news', 'meta_key');
        $this->dropColumn('news', 'meta_desc');


        $this->dropColumn('news_category', 'h1');
        $this->dropColumn('news_category', 'meta_title');
        $this->dropColumn('news_category', 'meta_key');
        $this->dropColumn('news_category', 'meta_desc');
    }
}
