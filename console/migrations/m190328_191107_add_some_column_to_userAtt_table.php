<?php

use yii\db\Migration;

/**
 * Handles adding some to table `userAtt`.
 */
class m190328_191107_add_some_column_to_userAtt_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_attachment_info', 'social_vk', $this->string());
        $this->addColumn('user_attachment_info', 'social_fb', $this->string());
        $this->addColumn('user_attachment_info', 'social_in', $this->string());
        $this->addColumn('user_attachment_info', 'social_tv', $this->string());
        $this->addColumn('user_attachment_info', 'social_yt', $this->string());

//        $this->addColumn('user_attachment_info', 'social_6', $this->string());
//        $this->addColumn('user_attachment_info', 'social_7', $this->string());
//        $this->addColumn('user_attachment_info', 'social_8', $this->string());
//        $this->addColumn('user_attachment_info', 'social_9', $this->string());
//        $this->addColumn('user_attachment_info', 'social_10', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('user_attachment_info', 'social_vk');
        $this->dropColumn('user_attachment_info', 'social_fb');
        $this->dropColumn('user_attachment_info', 'social_in');
        $this->dropColumn('user_attachment_info', 'social_tv');
        $this->dropColumn('user_attachment_info', 'social_yt');
    }
}
