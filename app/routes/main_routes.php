<?php

return [
    'GET:' => 'main/viewHomePage:category,product,cart',

    'GET:set-language/([a-z]+)' => 'language/changeLanguage/$1:language',
    'GET:set-currency/([A-Z]+)' => 'currency/changeCurrency/$1:currency',

    'GET:category/([0-9]+)' => 'category/view/$1:category,product,cart,currency',

    'GET:products' => 'product/viewAllProduct:category,product,cart,currency',
    'GET:product/([0-9]+)' => 'product/viewSingleProduct/$1:category,product,cart,currency',

    'GET:new' => 'main/viewLastAddedProducts:category,product,cart,currency',
    'GET:contacts' => 'main/viewContacts:category,product,cart',

    'GET:add-to-cart/([0-9]+)' => 'product/addToCart/$1:category,product,cart',
    'GET:cart-delete/([0-9]+)' => 'cart/deleteFromCart/$1:category,product,cart',

    'GET:cart' => 'cart/viewCart:category,product,cart,currency',
    'GET:order-form' => 'cart/viewOrderForm:category,product,cart,currency',

    'POST:confirm-order' => 'email/confirmOrder:category,product,cart,email,currency',
];