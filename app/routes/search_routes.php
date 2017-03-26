<?php

return [
    'GET:search-page' => 'search/viewSearchPage',
    'GET:search-page/([a-zA-Z0-9]+)' => 'search/viewSearchPage/$1',

    'GET:search/([a-zA-Z0-9]+)' => 'search/searchProducts/$1',
];