<?php

/* @var $this yii\web\View */
/* @var $item \common\models\Item */

?>

<li class="catalogue-content__list-item">
    <div class="catalogue-item" data-id="<?= $item->id ?>">
        <a class="catalogue-item__title" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>"><?= $item->title ?></a>
        <span class="catalogue-item__articul">Артикул <?= $item->article ?></span>
        <a class="catalogue-item__img-link" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>">
            <img class="catalogue-item__img" src="<?= $item->imageUrl ?>" alt="">
        </a>
        <select class="catalogue-item__size">
            <option>36 euro</option>
            <option>37 euro</option>
            <option>38 euro</option>
            <option>39 euro</option>
            <option>40 euro</option>
            <option>41 euro</option>
            <option>42 euro</option>
        </select>
        <?php
        if ($item->old_price) {
            echo sprintf('<span class="catalogue-item__price catalogue-item__price--old">Старая цена: %s<span class="ruble">Р</span></span>', $item->old_price);
        }
        ?>

        <span class="catalogue-item__price">Цена: <?= $item->new_price ?><span class="ruble">Р</span></span>
        <a class="btn btn--ebn" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>">Заказать</a>
        <a class="catalogue-item__more" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>">Подробнее</a>
    </div>
</li>
