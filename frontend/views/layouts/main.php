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

$route = Yii::$app->controller->getRoute();
$isIndex = $route == 'site/index' ? 'main-menu__list-item--active' : '';
$isCatalogue = $route == 'site/catalogue' ? 'main-menu__list-item--active' : '';
$isDelivery = $route == 'site/delivery' ? 'main-menu__list-item--active' : '';
$isReviews = $route == 'site/reviews' ? 'main-menu__list-item--active' : '';
$isContacts = $route == 'site/contacts' ? 'main-menu__list-item--active' : '';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>ALISAMEGASTAR</title>
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

<a id="nav-menu-cart" href="/cart" class="header-informer">
    <svg class="header-informer__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20" x="0px" y="0px" viewBox="0 0 486.569 486.569" style="enable-background:new 0 0 486.569 486.569;" xml:space="preserve">
        <path d="M146.069,320.369h268.1c30.4,0,55.2-24.8,55.2-55.2v-112.8c0-0.1,0-0.3,0-0.4c0-0.3,0-0.5,0-0.8c0-0.2,0-0.4-0.1-0.6   c0-0.2-0.1-0.5-0.1-0.7s-0.1-0.4-0.1-0.6c-0.1-0.2-0.1-0.4-0.2-0.7c-0.1-0.2-0.1-0.4-0.2-0.6c-0.1-0.2-0.1-0.4-0.2-0.6   c-0.1-0.2-0.2-0.4-0.3-0.7c-0.1-0.2-0.2-0.4-0.3-0.5c-0.1-0.2-0.2-0.4-0.3-0.6c-0.1-0.2-0.2-0.3-0.3-0.5c-0.1-0.2-0.3-0.4-0.4-0.6   c-0.1-0.2-0.2-0.3-0.4-0.5c-0.1-0.2-0.3-0.3-0.4-0.5s-0.3-0.3-0.4-0.5s-0.3-0.3-0.4-0.4c-0.2-0.2-0.3-0.3-0.5-0.5   c-0.2-0.1-0.3-0.3-0.5-0.4c-0.2-0.1-0.4-0.3-0.6-0.4c-0.2-0.1-0.3-0.2-0.5-0.3s-0.4-0.2-0.6-0.4c-0.2-0.1-0.4-0.2-0.6-0.3   s-0.4-0.2-0.6-0.3s-0.4-0.2-0.6-0.3s-0.4-0.1-0.6-0.2c-0.2-0.1-0.5-0.2-0.7-0.2s-0.4-0.1-0.5-0.1c-0.3-0.1-0.5-0.1-0.8-0.1   c-0.1,0-0.2-0.1-0.4-0.1l-339.8-46.9v-47.4c0-0.5,0-1-0.1-1.4c0-0.1,0-0.2-0.1-0.4c0-0.3-0.1-0.6-0.1-0.9c-0.1-0.3-0.1-0.5-0.2-0.8   c0-0.2-0.1-0.3-0.1-0.5c-0.1-0.3-0.2-0.6-0.3-0.9c0-0.1-0.1-0.3-0.1-0.4c-0.1-0.3-0.2-0.5-0.4-0.8c-0.1-0.1-0.1-0.3-0.2-0.4   c-0.1-0.2-0.2-0.4-0.4-0.6c-0.1-0.2-0.2-0.3-0.3-0.5s-0.2-0.3-0.3-0.5s-0.3-0.4-0.4-0.6c-0.1-0.1-0.2-0.2-0.3-0.3   c-0.2-0.2-0.4-0.4-0.6-0.6c-0.1-0.1-0.2-0.2-0.3-0.3c-0.2-0.2-0.4-0.4-0.7-0.6c-0.1-0.1-0.3-0.2-0.4-0.3c-0.2-0.2-0.4-0.3-0.6-0.5   c-0.3-0.2-0.6-0.4-0.8-0.5c-0.1-0.1-0.2-0.1-0.3-0.2c-0.4-0.2-0.9-0.4-1.3-0.6l-73.7-31c-6.9-2.9-14.8,0.3-17.7,7.2   s0.3,14.8,7.2,17.7l65.4,27.6v61.2v9.7v74.4v66.5v84c0,28,21,51.2,48.1,54.7c-4.9,8.2-7.8,17.8-7.8,28c0,30.1,24.5,54.5,54.5,54.5   s54.5-24.5,54.5-54.5c0-10-2.7-19.5-7.5-27.5h121.4c-4.8,8.1-7.5,17.5-7.5,27.5c0,30.1,24.5,54.5,54.5,54.5s54.5-24.5,54.5-54.5   s-24.5-54.5-54.5-54.5h-255c-15.6,0-28.2-12.7-28.2-28.2v-36.6C126.069,317.569,135.769,320.369,146.069,320.369z M213.269,431.969   c0,15.2-12.4,27.5-27.5,27.5s-27.5-12.4-27.5-27.5s12.4-27.5,27.5-27.5S213.269,416.769,213.269,431.969z M428.669,431.969   c0,15.2-12.4,27.5-27.5,27.5s-27.5-12.4-27.5-27.5s12.4-27.5,27.5-27.5S428.669,416.769,428.669,431.969z M414.169,293.369h-268.1   c-15.6,0-28.2-12.7-28.2-28.2v-66.5v-74.4v-5l324.5,44.7v101.1C442.369,280.769,429.669,293.369,414.169,293.369z"/>
    </svg>
    <span class="header-informer__text">Корзина</span>
    <span class="header-informer__counter">(0)</span>
</a>

<a id="nav-menu-shop" href="/catalogue" class="header-informer header-informer--catalogue">
    <svg class="header-informer__icon" xmlns="http://www.w3.org/2000/svg" width="26" height="17" viewBox="0 0 26 17">
        <g fill-rule="nonzero">
            <path d="M.981 2.186H25.02A.977.977 0 0 0 26 1.214a.977.977 0 0 0-.981-.971H.98A.977.977 0 0 0 0 1.214c0 .537.44.972.981.972zM.981 9.471H25.02A.977.977 0 0 0 26 8.5a.977.977 0 0 0-.981-.971H.98A.977.977 0 0 0 0 8.5c0 .536.44.971.981.971zM.981 16.757H25.02a.977.977 0 0 0 .981-.971.977.977 0 0 0-.981-.972H.98a.977.977 0 0 0-.981.972c0 .536.44.971.981.971z"/>
        </g>
    </svg>
    <span class="header-informer__text">Каталог</span>
    <span class="header-informer__counter"></span>
</a>

<header class="c-header">
    <nav class="c-header__wrap">
        <a class="c-header__logo" href="/">
            <img src="/images/logo.png">
            <span class="c-header__logo-desc">Магазин спортивной обуви</span>
        </a>
        <div class="contacts-info">
            <a class="contacts-info__phone" href="tel:+ 7 (499) 110-99-71">+ 7 (499) 110-99-71</a>
            <span class="contacts-info__job-time">ПН-ВС с 09:00 до 21:00</span>
            <span class="contacts-info__address">
                <svg width="15" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035    c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719    c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                </svg>
                <span class="contacts-info__adress-text">г. Москва, ул. Илона Маска, 90, стр 1</span>
            </span>
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
<!--            <li class="c-menu__list-item c-cart-item">-->
<!--                <a href="" class="c-cart-item__image" style="background: url(img/content/cart_1.png); background-size: cover;"></a>-->
<!--                <div class="c-cart-item__info">-->
<!--                    <a href="">-->
<!--                        <span class="c-cart-item__name">Название товара из каталога</span>-->
<!--                        <span class="c-cart-item__desc">Размер: XL</span>-->
<!--                    </a>-->
<!--                    <div class="c-cart-item__price-container">-->
<!--                        <span>500 Р</span>-->
<!--                        <button class="c-cart-item__btn-del">-->
<!--                            <span class="btn-close btn-close--active"></span>Удалить-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="c-menu__list-item c-cart-item">-->
<!--                <a href="" class="c-cart-item__image" style="background: url(img/content/cart_2.png); background-size: cover;"></a>-->
<!--                <div class="c-cart-item__info">-->
<!--                    <a href="">-->
<!--                        <span class="c-cart-item__name">Рассыпчатая пудра Multi-Eclat</span>-->
<!--                        <span class="c-cart-item__desc">Оттенок: PEACHY PINK</span>-->
<!--                        <span class="c-cart-item__desc">Объем: 50мл</span>-->
<!--                    </a>-->
<!--                    <div class="c-cart-item__price-container">-->
<!--                        <span>500 Р</span>-->
<!--                        <button class="c-cart-item__btn-del">-->
<!--                            <span class="btn-close btn-close--active"></span>Удалить-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
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
<main class="c-main">
    <nav class="main-menu">
        <ul class="main-menu__list">
            <li class="main-menu__list-item <?= $isIndex?>"><a href="/">Главная</a></li>
            <li class="main-menu__list-item <?= $isCatalogue?>"><a href="catalogue">Каталог</a></li>
            <li class="main-menu__list-item <?= $isDelivery?>"><a href="delivery">Доставка</a></li>
            <li class="main-menu__list-item <?= $isReviews?>"><a href="reviews">Отзывы</a></li>
            <li class="main-menu__list-item <?= $isContacts?>"><a href="contacts">Контакты</a></li>
        </ul>
    </nav>
    <?= $content ?>
</main>

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
        <div class="contacts-info contacts-info--footer">
            <a class="contacts-info__phone" href="tel:+ 7 (499) 110-99-71">+ 7 (499) 110-99-71</a>
            <span class="contacts-info__job-time">ПН-ВС с 09:00 до 21:00</span>
            <span class="contacts-info__address">
                <svg width="15" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035    c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719    c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                </svg>
                <span class="contacts-info__adress-text">г. Москва, ул. Илона Маска, 90, стр 1</span>
            </span>
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    new Vue({
        //this targets the div id app
        el: '#search-panel',
        data: {
            minprice: '',
            maxprice: ''
        },
        methods: {
            submitForm: function () {
                var minPriceString = '';
                if (this.minprice != '' && this.isNumeric(this.minprice)) {
                    minPriceString = 'min_price=' + this.minprice + '&';
                }
                var maxPriceString = '';
                if (this.maxprice != '' && this.isNumeric(this.maxprice)) {
                    maxPriceString = 'max_price=' + this.maxprice;
                }
                console.log(minPriceString);
                console.log(maxPriceString);
                console.log(minPriceString == '' && maxPriceString == '');

                if (minPriceString == '' && maxPriceString == '') {
                    return;
                }

                location.href = '/?' + minPriceString + maxPriceString;
            },
            isNumeric: function (n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            },
        }
    });


    (function($) {
        $(function() {
            apl.ui.search.init();
            apl.ui.menuShop.init();
            apl.ui.menuCart.init();
            apl.ui.cart.init();
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
                   $('#nav-menu-cart').on('click', function(e) {
                       e.preventDefault();
                       toggleMenu();
                   });
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
