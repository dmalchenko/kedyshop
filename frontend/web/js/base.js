// start app

// register modal component

var vssCartBus = new Vue();

/* ----- vssCart Init ----- */

var vssCartData = {
    data: {
        products: []
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
        },
        setVssCart: function() {
            if (localStorage) {
                localStorage.setItem('vssCart', JSON.stringify(this.data));
            }
            else {
                console.log("localStorage isn't support!");
            }
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
    }
});

Vue.component('modal', {
    template: '#modal-template',
    components: {
        'vss-cart': vssCart
    }
});


new Vue({
    el: '#app',
    components: {
        'vss-cart': vssCart
    },
    data: {
        showModalCart: false,
        showModalReg: false,
        minprice: '',
        maxprice: '',
        prodcount: vssCartData.data.products.length
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
    }
});


var csrfToken = $('meta[name="csrf-token"]').attr("content");

$(function() {

    $('.vss-cart-add-product').click(function(e) {
        e.preventDefault();
        var $product = $(this).closest('.js-product');
        var $size = $($(this).siblings('.catalogue-item__size')).val();
        console.log($size);
        vssCartBus.$emit('vss-cart-add-product', {
            id: $product.data('id'),
            title: $product.data('title'),
            image: $product.data('image'),
            price: $product.data('price'),
            size: $size,
            count: 1
        })
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
    });

    $('.js-send-data').on('click', function () {
        console.log(vssCartData.data.products);
        var megaProducts = vssCartData.data.products;
        if (!megaProducts.length) {
            alert('Массив пустой!');
        }
        $.ajax({
            url: "/site/purchase",
            method: "POST",
            data: {
                name: 'Илон Маск',
                phone: '999 999 99',
                address: 'г. Москва, ул. Илона Маска, 90, стр 1',
                products: megaProducts,
                _csrf: csrfToken
            }
        }).done(function() {
            alert('Успех!');
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