<?php

class CategoryController extends Controller
{
    public function viewAction($categoryId)
    {
        $limitOfProducts = 10;

        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree(0));
        $this->smarty->assign("categoryProductsList", $this->getCategoryProducts($categoryId, $limitOfProducts));

        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->display("contents/categoryPage.tpl");
    }
}