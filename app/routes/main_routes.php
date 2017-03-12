<?php

return [

    'GET:' => 'main/index:category,product,cart',

    'GET:category/([0-9]+)' => 'category/view/$1:category,product,cart',

    'GET:products' => 'product/viewAll:category,product,cart',
    'GET:product/([0-9]+)' => 'product/viewSingle/$1:product,cart',
    'GET:cart' => 'cart/viewCart:product,cart',
];