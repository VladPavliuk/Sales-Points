<?php

class ProductController extends Controller
{
    public function viewSingleProductAction($productId)
    {
        $this->smarty->assign('singleProductItem', $this->getSingleProduct($productId));
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree());
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/singleProductPage.tpl");
    }

    public function viewAllProductAction()
    {
        $limitOfProducts = 10;

        $this->smarty->assign('productsList', $this->getLastAddedProducts($limitOfProducts));
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree());
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/productsListPage.tpl");
    }
}