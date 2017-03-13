<?php

class MainController extends Controller
{

    public function viewHomePageAction()
    {
        $limitOfProducts = 1;

        $this->smarty->assign('parentCategoriesList', $this->getParentCategories());
        $this->smarty->assign('lastAddedProducts', $this->getCategoryProducts(0, $limitOfProducts));
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/homePage.tpl");
    }
}