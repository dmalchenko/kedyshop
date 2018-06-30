<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property Category $parent
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public static function getAllCategories($id)
    {
        $r = self::find()
            ->select(['id'])
            ->where(['parent_id' => $id])
            ->column();
        return array_merge($r, [$id]);

    }

    public static function getCategoryMenu()
    {
        $r = self::find()
            ->asArray()
            ->all();

        $mainGroup = [];
        $d = $r;
        foreach ($r as $row) {
            if ($row['parent_id'] == 0) {
                $mainGroup[$row['id']] = $row;
                foreach ($d as $subRow) {
                    if ($subRow['parent_id'] == $row['id']) {
                        $mainGroup[$row['id']]['items'][] = $subRow;
                    }
                }
            }
        }

        return $mainGroup;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'default', 'value' => null],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return array|Category[]|\yii\db\ActiveRecord[]
     */
    public static function getCategoryList()
    {
        $list = self::find()
            ->select(['id', 'name'])
            ->indexBy('id')
            ->all();

        $list = ArrayHelper::map($list, 'id', 'name');
        $list[0] = 'NOT SET';
        return $list;
    }

    public function getParent()
    {
        return $this->hasOne(self::className(), ['id' => 'parent_id'])->from('category as par');
    }
}
