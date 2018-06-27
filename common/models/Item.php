<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $old_price
 * @property int $new_price
 * @property string $image
 * @property string $article
 * @property string $imageUrl
 * @property string $category_id
 * @property int $created_at
 * @property int $updated_at
 */
class Item extends \yii\db\ActiveRecord
{
    public $image_file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['old_price', 'new_price', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['old_price', 'new_price', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'image', 'article', 'category_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'old_price' => 'Old Price',
            'new_price' => 'New Price',
            'image' => 'Image',
            'article' => 'Article',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getImageUrl()
    {
        return Yii::getAlias('/images/content/' . $this->image);
    }

    /**
     * @return array
     */
    public static function getCategories()
    {
        return [
            'Adidas' => 'Adidas',
            'Nike' => 'Nike',
            'Vans' => 'Vans',
            'Reebok' => 'Reebok',
            'Other' => 'Other',
        ];
    }
}
