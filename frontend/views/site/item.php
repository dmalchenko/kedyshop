<?php

/* @var $this \yii\web\View */
/* @var $item \common\models\Item */
?>

<div class="product-page">
    <div class="product-page__row">
        <div class="product-page__product">
            <div class="product" data-id="<?= $item->id ?>">
                <a class="product__title" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>"><?= $item->title ?></a>
                <span class="product__articul">Артикул <?= $item->article ?></span>
                <a class="product__img-link" href="<?= \yii\helpers\Url::toRoute(['site/item', 'id' => $item->id])?>">
                    <img class="product__img" src="<?= $item->imageUrl ?>" alt="">
                </a>
                <div class="product__info">
                    <div class="product__promo">
                        <div class="product__promo-item">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 26 26" enable-background="new 0 0 26 26">
                                <path d="m.3,14c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l1.4-1.4c0.4-0.4 1-0.4 1.4,0l.1,.1 5.5,5.9c0.2,0.2 0.5,0.2 0.7,0l13.4-13.9h0.1v-8.88178e-16c0.4-0.4 1-0.4 1.4,0l1.4,1.4c0.4,0.4 0.4,1 0,1.4l0,0-16,16.6c-0.2,0.2-0.4,0.3-0.7,0.3-0.3,0-0.5-0.1-0.7-0.3l-7.8-8.4-.2-.3z"/>
                            </svg>
                            <span>100% ОРИГИНАЛЬНАЯ ПРОДУКЦИЯ</span>
                        </div>
                        <div class="product__promo-item">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 26 26" enable-background="new 0 0 26 26">
                                <path d="m.3,14c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l1.4-1.4c0.4-0.4 1-0.4 1.4,0l.1,.1 5.5,5.9c0.2,0.2 0.5,0.2 0.7,0l13.4-13.9h0.1v-8.88178e-16c0.4-0.4 1-0.4 1.4,0l1.4,1.4c0.4,0.4 0.4,1 0,1.4l0,0-16,16.6c-0.2,0.2-0.4,0.3-0.7,0.3-0.3,0-0.5-0.1-0.7-0.3l-7.8-8.4-.2-.3z"/>
                            </svg>
                            <span>ОФИЦИАЛЬНАЯ ПОСТАВКА В РОССИЮ (РСТ)</span>
                        </div>
                        <div class="product__promo-item">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 26 26" enable-background="new 0 0 26 26">
                                <path d="m.3,14c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l1.4-1.4c0.4-0.4 1-0.4 1.4,0l.1,.1 5.5,5.9c0.2,0.2 0.5,0.2 0.7,0l13.4-13.9h0.1v-8.88178e-16c0.4-0.4 1-0.4 1.4,0l1.4,1.4c0.4,0.4 0.4,1 0,1.4l0,0-16,16.6c-0.2,0.2-0.4,0.3-0.7,0.3-0.3,0-0.5-0.1-0.7-0.3l-7.8-8.4-.2-.3z"/>
                            </svg>
                            <span>ТОВАР В НАЛИЧИИ</span>
                        </div>
                    </div>
                    <div class="product__desc">
                        <?php
                        if ($item->old_price) {
                            echo sprintf('<span class="product__price product__price--old">Старая цена: %s<span class="ruble">Р</span></span>', $item->old_price);
                        }
                        ?>
                        <span class="product__price">Цена: <?= $item->new_price ?><span class="ruble">Р</span></span>
                        <select class="product__size">
                            <option>36 euro</option>
                            <option>37 euro</option>
                            <option>38 euro</option>
                            <option>39 euro</option>
                            <option>40 euro</option>
                            <option>41 euro</option>
                            <option>42 euro</option>
                        </select>
                        <a class="btn btn--ebn btn--block btn--red btn--xl" href="">Заказать по акции</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
