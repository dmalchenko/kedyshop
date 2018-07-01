<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description',
            'old_price',
            'new_price',
            'image' => [
                'format' => 'html',
                'label' => 'Картинки',
                'value' => function(\backend\models\Item $model) {
                    $images = $model->images;
                    $result = '';
                    if ($images) {
                        foreach ($images as $image) {
                            $url = Url::to($image);
                            $result .= Html::img(Yii::getAlias('@frontendUrl' . $url), ['height' => 100]);
                        }
                    }
                    return $result;
                }
            ],
            'category_id',
            'article',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
