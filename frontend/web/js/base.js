// start app

// register modal component

var vssCartBus = new Vue();

/* ----- vssCart Init ----- */

var vssCartData = {
    data: {
        products: [],
        productsCount: 0
    }
};

var vssCart = Vue.extend({
    template: '#template-vss-cart',
    props: {
        type: String,
        eventable: Boolean
    },
    name: 'vss-cart',
    data: function() {
        return vssCartData
    },
    methods: {
        initVssCart: function() {
            if (localStorage) {
                if (localStorage.getItem('vssCart')) {
                    this.$set(this, 'data', JSON.parse(localStorage.getItem('vssCart')));
                }
            }
            else {
                console.log("localStorage isn't support!");
            }
            console.log(this.getProductsCount());
            this.data.productsCount = this.getProductsCount();
        },
        setVssCart: function() {
            var self = this;
            console.info(this.getProductsCount());


            console.info(vssCartData.data.productsCount);
            if (localStorage) {
                localStorage.setItem('vssCart', JSON.stringify(this.data));
            }
            else {
                console.log("localStorage isn't support!");
            }

            this.data.productsCount = this.getProductsCount();

            vssCartBus.$emit('vss-cart-update');
        },
        addProduct: function(product) {
            var self          = this;
            var productNumber = self.findProductNumber(product);
            if (productNumber === undefined) {
                console.log(1);
//                    if (this.data.products[productNumber].size != product.size) {
//
//                    }
                console.log(4);
                self.data.products.push({
                    id: product.id,
                    title: product.title,
                    price: product.price,
                    size: product.size,
                    count: 1
                });
            } else {
                console.log(2);
                self.data.products[productNumber].count += 1;
            }
            this.setVssCart();
        },
        removeProduct: function(product) {
            var productNumber = this.findProductNumber(product);
            this.data.products.splice(productNumber, 1);
            this.setVssCart();
        },
        removeProducts: function() {
            this.data.products = [];
            this.setVssCart();
        },
        reduceProduct: function(product) {
            var productNumber = this.findProductNumber(product);
            if (this.data.products[productNumber].count > 1) {
                this.data.products[productNumber].count--;
                this.setVssCart();
            }
            else {
                this.removeProduct(product);
            }
        },
        increaseProduct: function(product) {
            var productNumber = this.findProductNumber(product);
            this.data.products[productNumber].count++;
            this.setVssCart();
        },
        setProduct: function(product, value) {
            var productNumber = this.findProductNumber(product);
            this.data.products[productNumber].count++;
            this.setVssCart();
        },
        findProductNumber: function(product) {
            for (var i = 0; i < this.data.products.length; i++) {
                if (this.data.products[i].id === product.id) {
                    return i;
                }
            }
        },
        findProductNumbers: function(product) {
            var productNumbers = [];
            for (var i = 0; i < this.data.products.length; i++) {
                if (this.data.products[i].id === product.id) {
                    productNumbers.push(i);
                }
            }
            return productNumbers;
        },
        getProductCount: function(product) {
            var productNumber = this.findProductNumber(product);

            return this.data.products[productNumber].count
        },
        getProductsCount: function() {
            var count = 0;
            for (var i = 0; i < this.data.products.length; i++) {
                count += this.data.products[i].count;
            }

            return count;
        },
        getProductsTotalPrice: function() {
            var price = 0;
            for (var i = 0; i < this.data.products.length; i++) {
                price += this.data.products[i].count * this.data.products[i].price;
            }

            return price.toFixed(0);
        },
        getProductTotalPrice: function(product) {
            var productNumber = this.findProductNumber(product);

            return this.data.products[productNumber].count * this.data.products[productNumber].price;
        }
    },
    created: function() {
        var self = this;
        self.initVssCart();
        vssCartBus.$on('vss-cart-add-product', function(product) {
//                if (self.eventable) {
            console.log(3);
            self.addProduct(product);
//                }
        });
        vssCartBus.$on('vss-cart-del-products', function(product) {
            self.removeProducts();
        });
        vssCartBus.$on('vss-cart-get-products-count', function(product) {
             self.getProductsCount();
        });
    }
});

Vue.component('modal', {
    template: '#modal-template',
    components: {
        'vss-cart': vssCart
    },
    mounted: function () {

    }
});


vm = new Vue({
    el: '#app',
    components: {
        'vss-cart': vssCart
    },
    data: {
        showModalCart: false,
        showModalReg: false,
        showModalSuccess: false,
        minprice: '',
        maxprice: '',
        productscount: vssCartData.data.productsCount
    },
    prop: {

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

            if (minPriceString == '' && maxPriceString == '') {
                return;
            }

            location.href = '/?' + minPriceString + maxPriceString;
        },
        isNumeric: function (n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
    },
    mounted: function () {
        var self = this;
        var tempVar = vssCartData.data.productsCount;
        this.productscount = tempVar;

        vssCartBus.$on('vss-cart-update', function() {
            self.productscount = vssCartData.data.productsCount;
        });
    }
});


var csrfToken = $('meta[name="csrf-token"]').attr("content");

$(function() {

    $('.vss-cart-add-product').click(function(e) {
        e.preventDefault();
        var $product = $(this).closest('.js-product');
        var $size = $($(this).siblings('.js-size')).val();
        vssCartBus.$emit('vss-cart-add-product', {
            id: $product.data('id'),
            title: $product.data('title'),
            image: $product.data('image'),
            price: $product.data('price'),
            size: $size,
            count: 1
        });
        // $('html, body').animate({
        //     scrollTop: $("body").offset().top
        // }, 500);

    });

});

(function($) {
    $(function() {
        apl.ui.menuShop.init();

        $("#btn-catalogue").click(function(e) {
            e.preventDefault();
            if ($("#catalogue").length) {
                $('html, body').animate({
                    scrollTop: $("#catalogue").offset().top
                }, 500);
            } else {
                location.href = '/';
            }
        });

        var $mainSlider = $('#main-gallery');
        if ($mainSlider.length) {
            $mainSlider.slick({
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 3000
            });
        }


        var $productSlider = $('#product-slider');
        if ($productSlider.length) {
            $productSlider.slick({
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000
            });
        }


        $("[data-fancybox]").fancybox({
            speed : 330,
// Бесконечная прокрутка галереи
            loop : true,
// Скорость появления/угасания прозрачности элементов
            opacity : 'auto',
// Отступы вокруг картинок (Игнорируется, если ширина окна менее 800px)
            margin : [44, 0],
// Горизонтальный отступ между слайдами
            gutter : 30,
// Панели управления
            infobar : false,
            buttons : true,
// Какие кнопки на панели управления
            slideShow  : true,
            fullScreen : false,
            thumbs     : true,
            closeBtn   : true,
            baseTpl	: '<div class="fancybox-container" role="dialog" tabindex="-1">' +
            '<div class="fancybox-bg"></div>' +
            '<div class="fancybox-controls">' +
            '<div class="fancybox-infobar">' +
            '<button data-fancybox-previous class="fancybox-button fancybox-button--left" title="Previous"></button>' +
            '<div class="fancybox-infobar__body">' +
            '<span class="js-fancybox-index"></span> / <span class="js-fancybox-count"></span>' +
            '</div>' +
            '<button data-fancybox-next class="fancybox-button fancybox-button--right" title="Next"></button>' +
            '</div>' +
            '<div class="fancybox-buttons">' +
            '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="Close (Esc)"></button>' +
            '</div>' +
            '</div>' +
            '<div class="fancybox-slider-wrap">' +
            '<div class="fancybox-slider"></div>' +
            '</div>' +
            '<div class="fancybox-caption-wrap"><div class="fancybox-caption"></div></div>' +
            '</div>',
// Индикатор загрузки
            spinnerTpl : '<div class="fancybox-loading"></div>',
// Шаблон для вывода ошибки
            errorTpl : '<div class="fancybox-error"><p>The requested content cannot be loaded. <br /> Please try again later.<p></div>',
// Шаблон для кнопки "Закрыть"
            closeTpl : '<button data-fancybox-close class="fancybox-close-small">×</button>',
// Куда вкладывать контейнер
        });
    });


$('.js-send-data').on('click', function () {
        var megaProducts = vssCartData.data.products;
        var errors = 0;

        var regName = $('#reg-name').val();
        var regPhone = $('#reg-phone').val();
        if (jQuery.isEmptyObject(regName)) {
            $('#label-reg-name').show().text('Введите имя');
            errors = 1;
        } else {
            $('#label-reg-name').hide();
        }
        if (jQuery.isEmptyObject(regPhone)) {
            $('#label-reg-phone').show().text('Введите телефон');
            errors = 1;
        } else {
            $('#label-reg-phone').hide();
        }

        if (errors) {
            return;
        }
        var regAdress = $('#reg-adress').val();
        $.ajax({
            url: "/site/purchase",
            method: "POST",
            data: {
                name: regName,
                phone: regPhone,
                address: regAdress,
                products: megaProducts,
                _csrf: csrfToken
            }
        }).done(function() {
            vm.showModalReg = false;
            vm.showModalSuccess = true;
            vssCartBus.$emit('vss-cart-del-products');
        });
    });

    apl = {};
    apl.ui = {};

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
})(jQuery);