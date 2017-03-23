<?php

return [
    //> Admin
    'GET:admin' => 'admin/viewAdminPage',

    //> Category editor
    'GET:admin/editor/category/add' => 'admin/viewCategoryEditorAddPage',

    'GET:admin/editor/category/select' => 'admin/viewCategoryEditorSelectPage',

    'POST:admin/editor/category' => 'admin/viewCategoryEditorEditPage',

    'POST:admin/category/add' => 'admin/addCategory',
    'POST:admin/category/edit' => 'admin/editCategory',
    'GET:admin/category/delete/([0-9]+)' => 'admin/deleteCategory/$1',
    //<

    //> Product editor
    'GET:admin/editor/product/add' => 'admin/viewProductAddPage',

    'GET:admin/editor/product/select' => 'admin/viewProductEditorSelectPage',
    'GET:admin/get-products-from-category/([0-9]+)' => 'admin/getProductsFromCategory/$1',

    'GET:admin/editor/product/([0-9]+)' => 'admin/viewProductEditorEditPage/$1',

    'POST:admin/product/add' => 'admin/addProduct',
    'POST:admin/product/edit' => 'admin/editProduct',
    'GET:admin/product/delete/([0-9]+)' => 'admin/deleteProduct',
    //<
    //<
];