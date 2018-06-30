<?php

use yii\db\Migration;

/**
 * Class m180630_091406_add_sex
 */
class m180630_091406_add_sex extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('item', 'sex', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn('item', 'sex');
    }
}
