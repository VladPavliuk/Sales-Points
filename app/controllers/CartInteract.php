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
        if(isset($_SESSION["cart"])) {
            return $_SESSION["cart"];
        } else {
            return false;
        }
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