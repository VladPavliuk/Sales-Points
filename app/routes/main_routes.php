<?php

return [

    'GET:' => 'main/viewHomePage:category,product,cart',

    'GET:category/([0-9]+)' => 'category/view/$1:category,product,cart',

    'GET:products' => 'product/viewAllProduct:category,product,cart',
    'GET:product/([0-9]+)' => 'product/viewSingleProduct/$1:category,product,cart',

    'GET:add-to-cart/([0-9]+)' => 'cart/addToCart:category,product,cart',
    'GET:cart' => 'cart/viewCart:category,product,cart',
];