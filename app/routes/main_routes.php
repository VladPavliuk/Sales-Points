<?php

return [
    'GET:' => 'main/viewHomePage',
    'GET:load-more-products-for-main-page/([0-9]+)' => 'main/getMoreProductFromEachCategory/$1',

    'GET:contacts' => 'main/viewContacts',

    //> Languages and Currency
    'GET:set-language/([a-z]+)' => 'language/changeLanguage/$1',
    'GET:set-currency/([A-Z]+)' => 'currency/changeCurrency/$1',
    //<

    'GET:category/([0-9]+)' => 'category/viewProductsInCategory/$1',

    'GET:product/([0-9]+)' => 'product/viewSingleProduct/$1',

    'GET:new' => 'product/viewLastAddedProducts',
    'GET:load-more-new-products/([0-9]+)/([0-9]+)' => 'product/loadMoreNewProducts/$1/$2',

    //> Cart interact
    'GET:add-to-cart/([0-9]+)' => 'cart/addToCart/$1',
    'GET:cart-delete/([0-9]+)' => 'cart/deleteFromCart/$1',
    //<

    'GET:cart' => 'cart/viewCart',
    'GET:order-form' => 'cart/viewOrderForm',

    'POST:confirm-order' => 'email/confirmOrder',
];