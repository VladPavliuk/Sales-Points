<?php

class ProductController extends Controller
{
    public function viewSingleProductAction($productId)
    {
        $productModelObject = new Product();
        $singleProductItem = $productModelObject->getSingleProduct($productId);

        $this->smarty->assign('singleProductItem', $singleProductItem);

        $this->smarty->display("contents/singleProductPage.tpl");
    }

    public function viewLastAddedProductsAction()
    {
        $productModelObject = new Product();
        $lastAddedProducts = $productModelObject->getLastAddedProducts(1);

        $this->smarty->assign('lastAddedProducts', $lastAddedProducts);

        $this->smarty->display("contents/newProductsPage.tpl");
    }

}