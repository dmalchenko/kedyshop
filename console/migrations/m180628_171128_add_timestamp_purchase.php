<?php

use yii\db\Migration;

/**
 * Class m180628_171128_add_timestamp_purchase
 */
class m180628_171128_add_timestamp_purchase extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('purchase', 'created_at', $this->integer());
        $this->addColumn('purchase', 'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180628_171128_add_timestamp_purchase cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180628_171128_add_timestamp_purchase cannot be reverted.\n";

        return false;
    }
    */
}
