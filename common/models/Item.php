<?php

namespace common\models;

use backend\models\Category;
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
 * @property array $images
 * @property string $article
 * @property string $imageUrl
 * @property string $category_id
 * @property Category $category
 * @property string $categoryName
 * @property string $sex
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

    public $files;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['files'], 'file', 'extensions' => 'jpg', 'mimeTypes' => 'image/jpeg', 'maxFiles' => 5, 'skipOnEmpty' => true],
            [['old_price', 'new_price', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['old_price', 'new_price', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'image', 'image2', 'image3', 'image4', 'image5', 'article', 'category_id', 'sex'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'old_price' => 'Цена без скидки',
            'new_price' => 'Цена по скидке',
            'image' => 'Картинка',
            'sex' => 'Пол',
            'article' => 'Ариткул',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getImageUrl()
    {
        $imgs = $this->image ? json_decode($this->image) : null;
        if (!$imgs) {
            return null;
        }
        return Yii::getAlias('/images/content/' . $imgs[0]);
    }

    public function getImages()
    {
        $imgs = $this->image ? json_decode($this->image) : null;
        if (!$imgs) {
            return null;
        }
        $result = [];
        foreach ($imgs as $i) {
            $result[] = Yii::getAlias('/images/content/' . $i);
        }

        return $result;
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

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryName()
    {
        if ($this->category) {
            return $this->category->name;
        }
    }
}
