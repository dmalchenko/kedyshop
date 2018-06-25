<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
<!--    <title>--><?//= Html::encode($this->title) ?><!--</title>-->
    <title>ALICEMEGASTAR</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>-->

<header class="c-header">
    <nav class="c-header__nav">
        <a class="c-header__logo" href="/">
            <img src="/images/logo.png">
        </a>
        <div class="c-header__links--left">
            <a id="nav-menu-shop" class="c-header__link c-header__link--menu" href="/catalogue">
                <span class="c-header__link-icon"></span>
                <span class="c-header__link-text">Меню</span>
            </a>
        </div>
        <div class="c-header__links--right">
            <a id="nav-menu-cart" class="c-header__link c-header__link--cart" href="/cart">
					<span class="c-header__link-icon">
						<span class="c-header__link-counter c-header__link-counter--active">4</span>
					</span>
                <span class="c-header__link-text">Корзина</span>
            </a>
        </div>
    </nav>
    <!-- Форма поиска -->
    <div id="search-page" class="c-search">
        <form id="search-form" class="c-search__form" action="/search" method="post">
            <input id="search-input" class="c-search__input" type="search" name="searchTerms" placeholder="Введите название товара" autocomplete="off" required="">
            <button id="search-clean-btn" class="btn-close" type="button"></button>
        </form>
    </div>
    <!-- /Форма поиска -->
    <!-- Меню магазина -->
    <div id="menu-shop" class="c-menu c-menu--shop">
        <button id="menu-shop-btn-close" class="c-menu__btn c-menu__btn--close">Меню сайта
            <span class="btn-close"></span>
        </button>
        <ul class="c-menu__list">
            <li>
                <a class="c-menu__btn" href="#">Главная</a>
            </li>
            <li>
                <a class="c-menu__btn" href="#">Каталог</a>
            </li>
            <li>
                <a class="c-menu__btn c-menu__btn--active" href="#">Доставка</a>
            </li>
            <li>
                <a class="c-menu__btn" href="#">Отзывы</a>
            </li>
            <li>
                <a class="c-menu__btn" href="#">Контакты</a>
            </li>
        </ul>
    </div>
    <!-- /Меню магазина -->
    <!-- Меню корзины -->
    <div id="menu-cart" class="c-menu c-menu--cart">
        <button id="menu-cart-btn-close" class="c-menu__btn c-menu__btn--close">Корзина
            <span class="btn-close"></span>
            <span class="c-header__link-icon">
					<span class="c-header__link-counter c-header__link-counter--active">4</span>
				</span>
        </button>
        <ul class="c-menu__list">
            <li class="c-menu__list-item c-cart-item">
                <a href="" class="c-cart-item__image" style="background: url(img/content/cart_1.png); background-size: cover;"></a>
                <div class="c-cart-item__info">
                    <a href="">
                        <span class="c-cart-item__name">Название товара из каталога</span>
                        <span class="c-cart-item__desc">Размер: XL</span>
                    </a>
                    <div class="c-cart-item__price-container">
                        <span>500 Р</span>
                        <button class="c-cart-item__btn-del">
                            <span class="btn-close btn-close--active"></span>Удалить
                        </button>
                    </div>
                </div>
            </li>
            <li class="c-menu__list-item c-cart-item">
                <a href="" class="c-cart-item__image" style="background: url(img/content/cart_2.png); background-size: cover;"></a>
                <div class="c-cart-item__info">
                    <a href="">
                        <span class="c-cart-item__name">Рассыпчатая пудра Multi-Eclat</span>
                        <span class="c-cart-item__desc">Оттенок: PEACHY PINK</span>
                        <span class="c-cart-item__desc">Объем: 50мл</span>
                    </a>
                    <div class="c-cart-item__price-container">
                        <span>500 Р</span>
                        <button class="c-cart-item__btn-del">
                            <span class="btn-close btn-close--active"></span>Удалить
                        </button>
                    </div>
                </div>
            </li>
        </ul>
        <div class="c-menu__confarmation">
            <div>
                <span class="c-menu__confarmation-caption c-menu__confarmation-caption--desc">Скидка:</span>
                <span class="c-menu__confarmation-price">0 Р</span>
            </div>
            <div>
                <span class="c-menu__confarmation-caption">Сумма заказа:</span>
                <span class="c-menu__confarmation-price">5000 Р</span>
            </div>
        </div>
        <div class="btns">
            <a href="" class="btn">Перейти к оплате</a>
        </div>
    </div>
    <!-- Меню корзины -->
</header>
<main class="c-main container--pre-header">
<!--    <div id="slider" class="c-slider">-->
<!--        <div style="background: url(img/content/slider_1.png); background-size: cover; height: 420px; background-position: center;">-->
<!--            <!-- <img src="img/content/slider_1.png"> -->
<!--            <h2 class="c-slider__header">Слайдер картинок</h2>-->
<!--            <p class="c-slider__text">Здесь ещё какая-нибудь надпись</p>-->
<!--        </div>-->
<!--        <div style="background: url(img/content/slider_1.png); background-size: cover; height: 420px; background-position: center;">-->
<!--            <!-- <img src="img/content/slider_1.png"> -->
<!--            <h1 class="c-slider__header">Слайдер картинок</h1>-->
<!--            <p class="c-slider__text">Здесь ещё какая-нибудь надпись</p>-->
<!--        </div>-->
<!--        <div style="background: url(img/content/slider_1.png); background-size: cover; height: 420px; background-position: center;">-->
<!--            <!-- <img src="img/content/slider_1.png"> -->
<!--            <h1 class="c-slider__header">Слайдер картинок</h1>-->
<!--            <p class="c-slider__text">Здесь ещё какая-нибудь надпись</p>-->
<!--        </div>-->
<!--    </div>-->

    <div class="container container--sized">
<!--        <h2 class="c-catalogue-header">Популярные товары</h2>-->
        <div class="c-catalogue-slider js-catalogue-slider">
            <ul class="c-catalogue-item-list">
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="/images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">Р</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__discount">10%</span>
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
            </ul>
            <ul class="c-catalogue-item-list">
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__discount">10%</span>
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
            </ul>
            <ul class="c-catalogue-item-list">
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__discount">10%</span>
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
            </ul>
            <ul class="c-catalogue-item-list">
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__discount">10%</span>
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
                <li class="c-catalogue-list-item">
                    <a href class="c-catalogue-item">
							<span class="c-catalogue-item__img-wrapper">
								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">
								<span class="c-catalogue-item__desc">
									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>
									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>
									<span class="c-catalogue-item__buy">
										<span class="c-catalogue-item__btn-more">
											<span class="icon icon--more"></span>
											<span class="c-catalogue-item__btn-more-text">Подробнее</span>
										</span>
										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">
											<span class="icon icon--cart"></span>
										</span>
									</span>
								</span>
							</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

<!--    <div class="container container--grey">-->
<!--        <nav class="c-main-menu__container">-->
<!--            <ul class="c-main-menu__list">-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Красота</a>-->
<!--                </li>-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Зоотовары</a>-->
<!--                </li>-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Мужчинам</a>-->
<!--                </li>-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Детское</a>-->
<!--                </li>-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Женское</a>-->
<!--                </li>-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Одежда</a>-->
<!--                </li>-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Гигиена</a>-->
<!--                </li>-->
<!--                <li class="c-main-menu__list-item">-->
<!--                    <a class="c-main-menu__link" href="">Для дома</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </nav>-->
<!--    </div>-->

<!--    <div class="c-main-description container container--centered">-->
<!--        <ul class="c-main-description__list">-->
<!--            <li class="c-main-description__list-item">-->
<!--                <span class="c-main-description__icon c-main-description__icon--choice"></span>-->
<!--                <div class="c-main-description__caption">-->
<!--                    <h3>Большой выбор товаров</h3>-->
<!--                    <p>Небольшое описание текстовое описание. Описание пункта. Текстовое описание пункта в несколько строчек.</p>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="c-main-description__list-item">-->
<!--                <span class="c-main-description__icon c-main-description__icon--delivery"></span>-->
<!--                <div class="c-main-description__caption">-->
<!--                    <h3>Быстрая доставка</h3>-->
<!--                    <p>Небольшое описание текстовое описание. Описание пункта. Текстовое описание пункта в несколько строчек.</p>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="c-main-description__list-item">-->
<!--                <span class="c-main-description__icon c-main-description__icon--payment"></span>-->
<!--                <div class="c-main-description__caption">-->
<!--                    <h3>Удобная оплата</h3>-->
<!--                    <p>Небольшое описание текстовое описание. Описание пункта. Текстовое описание пункта в несколько строчек.</p>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->

<!--    <div class="c-promo-photo" style="background: url(img/content/promo-main.jpg); background-size: cover; background-position: left;">-->
<!--        <div class="c-promo-photo__caption">-->
<!--            <h2 class="c-promo-photo__header">Промо картинка и текст о магазине</h2>-->
<!--            <p class="c-promo-photo__text">Небольшое описание магазина в несколько строчек. Текстовое описание. Промо картинка и небольшое текстовое описание о магазине в несколько строчек.</p>-->
<!--        </div>-->
<!--    </div>-->
</main>

<!--<div class="container container--sized">-->
<!--    <h2 class="c-catalogue-header">Вы недавно смотрели</h2>-->
<!--    <div class="c-catalogue-slider js-catalogue-slider">-->
<!--        <ul class="c-catalogue-item-list">-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-5.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-6.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-7.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <ul class="c-catalogue-item-list">-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-5.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="images/content/content-7.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-7.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <ul class="c-catalogue-item-list">-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-5.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-6.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="c-catalogue-list-item">-->
<!--                <a href class="c-catalogue-item">-->
<!--							<span class="c-catalogue-item__img-wrapper">-->
<!--								<img class="c-catalogue-item__img" src="img/content/content-7.jpg">-->
<!--								<span class="c-catalogue-item__desc">-->
<!--									<span class="c-catalogue-item__name">Название товара<span  class="c-catalogue-item__name-full"> в каталоге</span></span>-->
<!--									<span class="c-catalogue-item__price">2000 <span class="ruble">p</span></span>-->
<!--									<span class="c-catalogue-item__buy">-->
<!--										<span class="c-catalogue-item__btn-more">-->
<!--											<span class="icon icon--more"></span>-->
<!--											<span class="c-catalogue-item__btn-more-text">Подробнее</span>-->
<!--										</span>-->
<!--										<span class="c-catalogue-item__btn-cart js-btn-add-to-cart">-->
<!--											<span class="icon icon--cart"></span>-->
<!--										</span>-->
<!--									</span>-->
<!--								</span>-->
<!--							</span>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->

<div class="c-footer__wrapper">
    <footer class="c-footer container container--centered">
        <ul class="c-footer__navigation">
            <li><a class="link" href="">Главная</a></li>
            <li><a class="link link--border-left" href="">Каталог</a></li>
            <li><a class="link link--border-left" href="">Доставка</a></li>
            <li><a class="link link--border-left" href="">О магазине</a></li>
            <li><a class="link link--border-left" href="">Отзывы</a></li>
            <li><a class="link link--border-left" href="">Контакты</a></li>
        </ul>
        <div class="c-footer__links">
            <div class="c-paying-systems">
                <a href="" class="c-visa-icon"></a>
                <a href="" class="c-master-card-icon"></a>
            </div>
        </div>
    </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    (function($) {
        $(function() {
            apl.ui.search.init();
            apl.ui.menuShop.init();
            apl.ui.menuCart.init();
            apl.ui.cart.init();

//            $('#slider').slick({
//                infinite: true,
//                dots: true
//            });
        });

        apl = {};
        apl.ui = {};

        apl.ui.search = (function($) {
            return {
                init: function() {
                    $('#nav-search').on('click', function(e) {
                        e.preventDefault();
                        $('#nav-search').addClass('c-header__link--active');
                        $('#search-page').show();
                        window.history.pushState('Поиск', 'Поиск', '/search');
                    });
                    $('#search-clean-btn').on('click', function() {
                        $('#search-input').val('');
                    });
                }
            }
        })(jQuery);

        apl.ui.menuShop = (function($) {
            function toggleMenu() {
                if ($('#menu-shop').hasClass('c-menu--opened')) {
                    $('#menu-shop').removeClass('c-menu--opened');
                } else {
                    $('#menu-shop').addClass('c-menu--opened');
                }
            }
            return {
                init: function() {
                    $('#nav-menu-shop').on('click', function(e) {
                        e.preventDefault();
                        toggleMenu();
                    });
                    $('#menu-shop-btn-close').on('click', function(e) {
                        e.preventDefault();
                        toggleMenu();
                    });
                    $(document).on('click', function(e) {
                        if ((!$(e.target).is($('#nav-menu-shop')) && $('#nav-menu-shop').has($(e.target)).length === 0) && (!$(e.target).is($('#menu-shop')) && $('#menu-shop').has($(e.target)).length === 0)) {
                            $('#menu-shop').removeClass('c-menu--opened ');
                        }
                    });
                }
            }
        })(jQuery);

        apl.ui.menuCart = (function($) {
            function toggleMenu() {
                if ($('#menu-cart').hasClass('c-menu--opened')) {
                    $('#menu-cart').removeClass('c-menu--opened');
                } else {
                    $('#menu-cart').addClass('c-menu--opened');
                }
            }
            return {
                init: function() {
//                    $('#nav-menu-cart').on('click', function(e) {
//                        e.preventDefault();
//                        toggleMenu();
//                    });
                    $('#menu-cart-btn-close').on('click', function(e) {
                        e.preventDefault();
                        toggleMenu();
                    });
                    $(document).on('click', function(e) {
                        if ((!$(e.target).is($('#nav-menu-cart')) && $('#nav-menu-cart').has($(e.target)).length === 0) && (!$(e.target).is($('#menu-cart')) && $('#menu-cart').has($(e.target)).length === 0)) {
                            $('#menu-cart').removeClass('c-menu--opened ');
                        }
                    });
                }
            }
        })(jQuery);

        apl.ui.cityModal = (function($) {
            return {
                init: function() {
                    $('.js-footer-link-city').on('click', function() {

                    });
                }
            }
        })(jQuery);

        apl.ui.cart = (function($) {
            return {
                init: function() {
                    $('.js-btn-add-to-cart').on('click', function(e) {
                        e.preventDefault();
                        /*Код добавления в корзину*/
                    });
                }
            }
        })(jQuery);
    })(jQuery);
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
