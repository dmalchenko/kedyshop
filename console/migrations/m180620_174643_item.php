<?php

use yii\db\Migration;

/**
 * Class m180620_174643_item
 */
class m180620_174643_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ]);
    }

    public function safeDown()
    {
        $this->dropTable('item');
    }
}