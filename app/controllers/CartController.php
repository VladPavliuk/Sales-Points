<?php

class CartController extends Controller
{
    public function viewCartAction()
    {
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree());
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->assign('cart', $this->getCart());

        $this->smarty->display("contents/cartPage.tpl");
    }

    public function deleteFromCartAction($productId)
    {
        $this->deleteFromCart($productId);

        $this->viewCartAction();
    }
}