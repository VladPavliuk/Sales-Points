<?php

return [

    'GET:' => 'main/index:main,category,product',
    'GET:product/([0-9]+)' => 'product/index/$1:main,category,product',


];