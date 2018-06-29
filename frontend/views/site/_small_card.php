<?php

/* @var $this yii\web\View */
/* @var $item \common\models\Item */

?>

<li class="catalogue-content__list-item">
    <div class="js-product catalogue-item" data-id="<?= $item->id ?>" data-title="<?= $item->title ?>" data-price="<?= $item->new_price ?>">
        <a class="catalogue-item__title" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>"><?= $item->title ?></a>
        <span class="catalogue-item__articul">Артикул <?= $item->article ?></span>
        <a class="catalogue-item__img-link" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>">
            <img class="catalogue-item__img" src="<?= $item->imageUrl ?>" alt="">
        </a>
        <select class="catalogue-item__size">
            <option>35 EUR / 22 см</option>
            <option>36 EUR / 22,5 см</option>
            <option>37 EUR / 23 см</option>
            <option>38 EUR / 23,5 см</option>
            <option>39 EUR / 24 см</option>
            <option>40 EUR / 24,5 см</option>
            <option>41 EUR / 25 см</option>
            <option>42 EUR / 26 см</option>
            <option>43 EUR / 26,5 см</option>
            <option>44 EUR / 27 см</option>
            <option>45 EUR / 28 см</option>
        </select>
        <?php
        if ($item->old_price) {
            echo sprintf('<span class="catalogue-item__price catalogue-item__price--old">Старая цена: %s<span class="ruble">Р</span></span>', $item->old_price);
        }
        ?>

        <span class="catalogue-item__price">Цена: <?= $item->new_price ?><span class="ruble">Р</span></span>
        <a class="vss-cart-add-product btn btn--ebn" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>">Заказать</a>
        <a class="catalogue-item__more" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>">Подробнее</a>
    </div>
</li>
