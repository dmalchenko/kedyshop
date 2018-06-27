<?php

use yii\db\Migration;

/**
 * Class m180627_171127_purchase
 */
class m180627_171127_purchase extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('purchase', [
            'id' => $this->primaryKey(),
            'name' => $this->string(1000),
            'phone' => $this->string(40),
            'address' => $this->string(1000),
            'price' => $this->string(100),
            'title' => $this->string(1000),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('purchase');
    }
}