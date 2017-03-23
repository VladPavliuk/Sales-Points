<?php

return [
    'GET:' => 'main/viewHomePage:category,product,cart',
    'GET:contacts' => 'main/viewContacts:category,product,cart',

    //> Languages and Currency
    'GET:set-language/([a-z]+)' => 'language/changeLanguage/$1:language,cart,category,product',
    'GET:set-currency/([A-Z]+)' => 'currency/changeCurrency/$1:currency,cart,category,product',
    //<

    'GET:category/([0-9]+)' => 'category/viewProductsInCategory/$1:category,product,cart,currency',

    'GET:product/([0-9]+)' => 'product/viewSingleProduct/$1:category,product,cart,currency',

    'GET:new' => 'product/viewLastAddedProducts:category,product,cart,currency',
    'GET:load-more-new-products/([0-9]+)/([0-9]+)' => 'product/loadMoreNewProducts/$1/$2:category,product,cart,currency',

    //> Cart interact
    'GET:add-to-cart/([0-9]+)' => 'cart/addToCart/$1:category,product,cart',
    'GET:cart-delete/([0-9]+)' => 'cart/deleteFromCart/$1:category,product,cart',
    //<

    //> User
   // 'GET:user/account' => 'user/showUserAccountPage:user',
    //'GET:' => '',
   // 'GET:' => '',
    //<

    //> Admin
    'GET:admin' => 'admin/viewAdminPage:category,product,cart,currency,admin',

    //> Category editor
    'GET:admin/editor/category/add' => 'admin/viewCategoryEditorAddPage:category,product,cart,currency,admin',

    'GET:admin/editor/category/select' => 'admin/viewCategoryEditorSelectPage:category,product,cart,currency,admin',

    'POST:admin/editor/category' => 'admin/viewCategoryEditorEditPage:category,product,cart,currency,admin',

    'POST:admin/category/add' => 'admin/addCategory:category,product,cart,currency,admin',
    'POST:admin/category/edit' => 'admin/editCategory:category,product,cart,currency,admin',
    'GET:admin/category/delete/([0-9]+)' => 'admin/deleteCategory/$1:category,product,cart,currency,admin',
    //<

    //> Product editor
    'GET:admin/editor/product/add' => 'admin/viewProductAddPage:category,product,cart,currency,admin',

    'GET:admin/editor/product/select' => 'admin/viewProductEditorSelectPage:category,product,cart,currency,admin',
    'GET:admin/get-products-from-category/([0-9]+)' => 'admin/getProductsFromCategory/$1:category,product,cart,currency,admin',

    'GET:admin/editor/product/([0-9]+)' => 'admin/viewProductEditorEditPage/$1:category,product,cart,currency,admin',

    'POST:admin/product/add' => 'admin/addProduct:category,product,cart,currency,admin',
    'POST:admin/product/edit' => 'admin/editProduct:category,product,cart,currency,admin',
    'GET:admin/product/delete/([0-9]+)' => 'admin/deleteProduct:category,product,cart,currency,admin',
    //<

    //<

    'GET:cart' => 'cart/viewCart:category,product,cart,currency',
    'GET:order-form' => 'cart/viewOrderForm:category,product,cart,currency',

    'POST:confirm-order' => 'email/confirmOrder:category,product,cart,email,currency',
];