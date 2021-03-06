<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
?>
<div class="purchase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'name',
            'phone',
            'address',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
