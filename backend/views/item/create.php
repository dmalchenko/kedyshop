<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Item */

$this->title = 'Добавить товар';
?>
<div class="item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
