<?php

class ProductController extends Controller
{
    public function viewSingleProductAction($productId)
    {
        $productModelObject = new Product();
        $singleProductItem = $productModelObject->getSingleProduct($productId);

        $this->smarty->assign('singleProductItem', $singleProductItem);

        $this->smarty->display("shop/singleProductPage.tpl");
    }

    public function viewLastAddedProductsAction()
    {
        $productModelObject = new Product();
        $lastAddedProducts = $productModelObject->getLastAddedProducts(12);

        $this->smarty->assign('lastAddedProducts', $lastAddedProducts);

        $this->smarty->display("shop/newProductsPage.tpl");
    }

    public function loadMoreNewProductsAction($productsAmount, $minProductsId)
    {
        $productModelObject  = new Product();
        $productsList = $productModelObject->getMoreNewProducts($productsAmount, $minProductsId);

        echo json_encode($productsList);
    }

}