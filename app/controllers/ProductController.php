<?php

class ProductController extends Controller
{

    /**
     * Render one product page.
     *
     * @param $productId
     */
    public function viewSingleProductAction($productId)
    {
        $singleProductItem = $this->productModel->getSingleProduct($productId);

        $this->smarty->assign('singleProductItem', $singleProductItem);

        $this->smarty->display("shop/singleProductPage.tpl");
    }

    /**
     * Render new products page.
     *
     */
    public function viewLastAddedProductsAction()
    {
        $lastAddedProducts = $this->productModel->getLastAddedProducts(12);

        $this->smarty->assign('lastAddedProducts', $lastAddedProducts);

        $this->smarty->display("shop/newProductsPage.tpl");
    }

    /**
     * Return chunk of products for new products page.
     * Action for page button "View More".
     *
     * @param $productsAmount
     * @param $minProductsId
     */
    public function loadMoreNewProductsAction($productsAmount, $minProductsId)
    {
        $productsList = $this->productModel->getMoreNewProducts($productsAmount, $minProductsId);

        echo json_encode($productsList);
    }

}