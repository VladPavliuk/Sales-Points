<?php

class ProductController extends Controller
{
    public function viewSingleAction($productId)
    {
        $this->smarty->assign('singleProductItem', $this->getSingleProduct($productId));

        $this->smarty->display("contents/singleProductPage.tpl");
    }

    public function viewAllAction()
    {
        $limitOfProducts = 2;

        $this->smarty->assign('productsList', $this->getLastAddedProducts($limitOfProducts));

        $this->smarty->display("contents/productsListPage.tpl");
    }

    private function getSingleProduct($productId)
    {
        $productModelObject = new Product();
        $singleProductItem = $productModelObject->getSingleProduct($productId);

        return $singleProductItem;
    }

    private function getLastAddedProducts($limitOfProducts)
    {
        $productModelObject = new Product();
        $lastAddedProducts = $productModelObject->getLastAddedProducts($limitOfProducts);

        return $lastAddedProducts;
    }
}