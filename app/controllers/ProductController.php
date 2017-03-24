<?php

class ProductController extends Controller
{
    public function viewSingleProductAction($productId)
    {
        $singleProductItem = $this->productModel->getSingleProduct($productId);

        $this->smarty->assign('singleProductItem', $singleProductItem);

        $this->smarty->display("shop/singleProductPage.tpl");
    }

    public function viewLastAddedProductsAction()
    {
        $lastAddedProducts = $this->productModel->getLastAddedProducts(12);

        $this->smarty->assign('lastAddedProducts', $lastAddedProducts);

        $this->smarty->display("shop/newProductsPage.tpl");
    }

    public function loadMoreNewProductsAction($productsAmount, $minProductsId)
    {
        $productsList = $this->productModel->getMoreNewProducts($productsAmount, $minProductsId);

        echo json_encode($productsList);
    }

}