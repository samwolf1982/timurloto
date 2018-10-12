<?php

use dektrium\rbac\migrations\Migration;

class m180409_120830_addadminrule extends Migration
{
    public function safeUp()
    {
        $this->createRole('admin', 'admin has all available permissions.');
        $this->createRole('guest', 'only guest permissions.');
        $this->createRole('simpleuser', 'only simpleuser permissions.');
      //  $this->createRule('adminrule', 'Adminule');
    }
    
    public function safeDown()
    {
        echo "m180409_120830_addadminrule cannot be reverted.\n";
        $this->removeItem('admin');
        $this->removeItem('guest');
        $this->removeItem('simpleuser');
        //$this->removeItem('adminrule');
        return false;
    }
}
