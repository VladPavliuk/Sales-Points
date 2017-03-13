<?php

class ProductController extends Controller
{
    public function viewSingleProductAction($productId)
    {
        $this->smarty->assign('singleProductItem', $this->getSingleProduct($productId));
        $this->smarty->assign('parentCategoriesList', $this->getParentCategories());
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/singleProductPage.tpl");
    }

    public function viewAllProductAction()
    {
        $limitOfProducts = 3;

        $this->smarty->assign('parentCategoriesList', $this->getParentCategories());
        $this->smarty->assign('productsList', $this->getCategoryProducts(0, $limitOfProducts));
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/productsListPage.tpl");
    }
}