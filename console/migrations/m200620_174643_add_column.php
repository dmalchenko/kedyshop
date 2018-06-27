<?php

use yii\db\Migration;

/**
 * Class m180620_174643_item
 */
class m200620_174643_add_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('item', 'category_id', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn('item', 'category_id');
    }
}