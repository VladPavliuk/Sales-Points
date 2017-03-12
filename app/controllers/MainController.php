<?php

class MainController extends Controller
{

    public function viewHomePageAction()
    {
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree());
        $this->smarty->assign('lastAddedProducts', $this->getLastAddedProducts(10));
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/homePage.tpl");
    }
}