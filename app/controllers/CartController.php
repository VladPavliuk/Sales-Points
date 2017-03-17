<?php

class CartController extends Controller
{
    public function viewCartAction()
    {
        $cartModelObject = new Cart();

        $this->smarty->assign('cart', $cartModelObject->getCartForRendering());

        $this->smarty->display("contents/cartPage.tpl");
    }

    public function viewOrderFormAction()
    {
        $cartModelObject = new Cart();

        if ($cartModelObject->getTotalAmount() > 0) {

            $this->smarty->assign('cart', $cartModelObject->getCartForRendering());

            $this->smarty->display("contents/confirmOrderPage.tpl");
        } else {
            Debug::showErrorPage("Ваш коши порожній");
        }
    }

    public function addToCartAction($productId)
    {
        $cartModelObject = new Cart();
        $cartModelObject->addToCart($productId);

        echo json_encode($cartModelObject->getTotalAmount());
    }

    public function deleteFromCartAction($productId)
    {
        $cartModelObject = new Cart();
        $cartModelObject->deleteFromCart($productId);

        $cartInfoList["total_products_amount"] = $cartModelObject->getTotalAmount();
        $cartInfoList["total_products_price"] = $cartModelObject->getTotalPrice();

        echo json_encode($cartInfoList);
    }
}