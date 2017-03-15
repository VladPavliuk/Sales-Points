<?php

class MainController extends Controller
{

    public function viewHomePageAction()
    {
        $limitOfProducts = 1;

        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree(0));
        $this->smarty->assign('lastAddedProductInCategories', $this->getCategoryProducts(0, $limitOfProducts));

        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/homePage.tpl");
    }

    public function viewLastAddedProductsAction()
    {
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree(0));
        $this->smarty->assign('lastAddedProducts',$this->getLastAddedProducts(10));

        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/newProductsPage.tpl");
    }

    public function viewContactsAction()
    {
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree(0));

        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/contactsPage.tpl");
    }
}