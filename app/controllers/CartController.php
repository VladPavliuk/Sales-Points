<?php

class CartController extends Controller
{
    /**
     * Render shopping cart page.
     *
     */
    public function viewCartAction()
    {
        $this->smarty->assign('cart', $this->cartModel->getCartForRendering());

        $this->smarty->display("shop/cartPage.tpl");
    }

    /**
     * Render order form page.
     *
     */
    public function viewOrderFormAction()
    {
        if ($this->cartModel->getTotalAmount() > 0) {

            $this->smarty->assign('cart', $this->cartModel->getCartForRendering());

            $this->smarty->display("shop/confirmOrderPage.tpl");
        } else {
            Debug::showErrorPage("Ваш коши порожній");
        }
    }

    /**
     * Add product to shopping cart.
     *
     * @param $productId
     */
    public function addToCartAction($productId)
    {
        $this->cartModel->addToCart($productId);

        echo json_encode($this->cartModel->getTotalAmount());
    }

    /**
     * Set amount of specific product.
     *
     * @param $productIdInCart
     * @param $amount
     */
    public function setProductAmountAction($productIdInCart, $amount)
    {
        $this->cartModel->setProductAmount($productIdInCart, $amount);

        $cartInfoList["total_products_amount"] = $this->cartModel->getTotalAmount();
        $cartInfoList["total_products_price"] = $this->cartModel->getTotalPrice();

        echo json_encode($cartInfoList);
    }

    /**
     * Delete product from shopping cart.
     *
     * @param $productId
     */
    public function deleteFromCartAction($productId)
    {
        $this->cartModel->deleteFromCart($productId);

        $cartInfoList["total_products_amount"] = $this->cartModel->getTotalAmount();
        $cartInfoList["total_products_price"] = $this->cartModel->getTotalPrice();

        echo json_encode($cartInfoList);
    }
}