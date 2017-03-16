<?php

trait CartInteract
{
    public function addToCartAction($productId)
    {
        $cartModelObject = new Cart();
        $cartModelObject->addToCart($productId);

        echo json_encode($this->getTotalAmount());
    }

    public function deleteFromCart($productId)
    {
        $cartModelObject = new Cart();
        $cartModelObject->deleteFromCart($productId);
    }

    public function getCart()
    {
        $cartModelObject = new Cart();
        return $cartModelObject->getCart();
    }

    public function getTotalPrice()
    {
        $cartModelObject = new Cart();
        return $cartModelObject->getTotalPrice();
    }

    public function getTotalAmount()
    {
        $cartModelObject = new Cart();
        return $cartModelObject->getTotalAmount();
    }
}