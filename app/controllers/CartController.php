<?php

class CartController extends Controller
{
    public function viewCartAction()
    {
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree(0));
        $this->smarty->assign('totalPrice', $this->getTotalPrice());
        $this->smarty->assign('totalAmount', $this->getTotalAmount());

        $this->smarty->assign('cart', $this->getCart());

        $this->smarty->display("contents/cartPage.tpl");
    }

    public function viewOrderFormAction()
    {
        if ($this->getTotalAmount() > 0) {
            $this->smarty->assign('parentCategoriesList', $this->getParentCategories());
            $this->smarty->assign('totalPrice', $this->getTotalPrice());
            $this->smarty->assign('totalAmount', $this->getTotalAmount());

            $this->smarty->assign('cart', $this->getCart());

            $this->smarty->display("contents/confirmOrderPage.tpl");
        } else {
            Debug::showErrorPage("Ваш коши порожній");
        }
    }


    public function deleteFromCartAction($productId)
    {
        $this->deleteFromCart($productId);

        $this->viewCartAction();
    }
}