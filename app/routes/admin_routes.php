<?php

return [
    //> Admin
    'GET:admin' => 'admin/viewAdminPage:admin',

    //> Category editor
    'GET:admin/editor/category/add' => 'admin/viewCategoryEditorAddPage:admin',

    'GET:admin/editor/category/select' => 'admin/viewCategoryEditorSelectPage:admin',

    'POST:admin/editor/category' => 'admin/viewCategoryEditorEditPage:admin',

    'POST:admin/category/add' => 'admin/addCategory:admin',
    'POST:admin/category/edit' => 'admin/editCategory:admin',
    'GET:admin/category/delete/([0-9]+)' => 'admin/deleteCategory/$1:admin',
    //<

    //> Product editor
    'GET:admin/editor/product/add' => 'admin/viewProductAddPage:admin',

    'GET:admin/editor/product/select' => 'admin/viewProductEditorSelectPage:admin',
    'GET:admin/get-products-from-category/([0-9]+)' => 'admin/getProductsFromCategory/$1:admin',

    'GET:admin/editor/product/([0-9]+)' => 'admin/viewProductEditorEditPage/$1:admin',

    'POST:admin/product/add' => 'admin/addProduct:admin',
    'POST:admin/product/edit' => 'admin/editProduct:admin',
    'GET:admin/product/delete/([0-9]+)' => 'admin/deleteProduct:admin',
    //<
    //<
];