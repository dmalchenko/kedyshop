<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $price
 * @property string $title
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'title'], 'string', 'max' => 1000],
            [['phone'], 'string', 'max' => 40],
            [['price'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'price' => 'Price',
            'title' => 'Title',
        ];
    }
}
