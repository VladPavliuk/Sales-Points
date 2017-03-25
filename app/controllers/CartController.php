<?php

class CartController extends Controller
{
    public function viewCartAction()
    {
        $this->smarty->assign('cart', $this->cartModel->getCartForRendering());
        // Debug::viewArray($this->cartModel->getCartForRendering());
        $this->smarty->display("shop/cartPage.tpl");
    }

    public function viewOrderFormAction()
    {
        if ($this->cartModel->getTotalAmount() > 0) {

            $this->smarty->assign('cart', $this->cartModel->getCartForRendering());

            $this->smarty->display("shop/confirmOrderPage.tpl");
        } else {
            Debug::showErrorPage("Ваш коши порожній");
        }
    }

    public function addToCartAction($productId)
    {
        $this->cartModel->addToCart($productId);

        echo json_encode($this->cartModel->getTotalAmount());
    }

    public function deleteFromCartAction($productId)
    {
        $this->cartModel->deleteFromCart($productId);

        $cartInfoList["total_products_amount"] = $this->cartModel->getTotalAmount();
        $cartInfoList["total_products_price"] = $this->cartModel->getTotalPrice();

        echo json_encode($cartInfoList);
    }
}