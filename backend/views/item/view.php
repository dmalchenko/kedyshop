<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'article',
            'category_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
