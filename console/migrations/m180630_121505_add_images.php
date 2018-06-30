<?php

use yii\db\Migration;

/**
 * Class m180630_121505_add_images
 */
class m180630_121505_add_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('item', 'image2', $this->string());
        $this->addColumn('item', 'image3', $this->string());
        $this->addColumn('item', 'image4', $this->string());
        $this->addColumn('item', 'image5', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('item', 'image2');
        $this->dropColumn('item', 'image3');
        $this->dropColumn('item', 'image4');
        $this->dropColumn('item', 'image5');

    }

}
