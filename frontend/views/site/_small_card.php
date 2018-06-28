<?php

/* @var $this yii\web\View */
/* @var $item \common\models\Item */

?>

<li class="catalogue-content__list-item">
    <div class="catalogue-item" data-id="<?= $item->id ?>">
        <span class="catalogue-item__articul">Артикул <?= $item->article ?></span>
        <a class="catalogue-item__title" href=""><?= $item->title ?></a>
        <a class="catalogue-item__img-link" href="">
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
        <div class="catalogue-item__btns btns btns--spaced">
            <a class="btn" href="">Купить</a>
        </div>
    </div>
</li>
