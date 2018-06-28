<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $price
 * @property string $title
 * @property int $created_at
 * @property int $updated_at
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
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className()
            ],
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
