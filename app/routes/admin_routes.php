<?php

return [
    'GET:admin' => 'admin/viewAdminPage:admin',

    //> Category editor
    'GET:admin/editor/category/(add)' => 'admin/viewCategoryEditor/$1:admin',

    'GET:admin/editor/category/(select)' => 'admin/viewCategoryEditor/$1:admin',

    'POST:admin/editor/category/(edit)' => 'admin/viewCategoryEditor/$1:admin',

    'POST:admin/category/add' => 'admin/addCategory:admin',
    'POST:admin/category/edit' => 'admin/editCategory:admin',
    'GET:admin/category/delete/([0-9]+)' => 'admin/deleteCategory/$1:admin',
    //<

    //> Product editor
    'GET:admin/editor/product/(add)' => 'admin/viewProductEditor/$1:admin',

    'GET:admin/editor/product/(select)' => 'admin/viewProductEditor/$1:admin',
    'GET:admin/get-products-from-category/([0-9]+)' => 'admin/getProductsFromCategory/$1:admin',

    'GET:admin/editor/product/(edit)/([0-9]+)' => 'admin/viewProductEditor/$1/$2:admin',

    'POST:admin/product/add' => 'admin/addProduct:admin',
    'POST:admin/product/edit' => 'admin/editProduct:admin',
    'GET:admin/product/delete/([0-9]+)' => 'admin/deleteProduct/$1:admin',
    //<
];