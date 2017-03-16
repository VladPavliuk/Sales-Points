<?php

class Cart extends Model
{
    public function getCart()
    {
        $renderCart = [];
        $i = 0;
        $currencyModelObject = new Currency();

        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $cartItem) {
                $renderCart[$i] = $cartItem;

                $renderCart[$i++]["price"] = $currencyModelObject->getPriceInCurrentCurrency($cartItem["price"]);
            }

            return $renderCart;
        } else {
            return false;
        }
    }

    public function addToCart($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE `id` = {$productId} LIMIT 1");

        $_SESSION['cart'][] = $queryResult->fetch();
    }

    public function deleteFromCart($productId)
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    public function getTotalPrice()
    {
        if (isset($_SESSION['cart'])) {
            $totalPrice = 0;

            foreach ($_SESSION['cart'] as $cartItem) {
                $totalPrice += floatval($cartItem["price"]);
            }
            $currencyModelObject = new Currency();
            $totalPrice = $currencyModelObject->getPriceInCurrentCurrency($totalPrice);

            return $totalPrice;
        }

        return 0;
    }

    public function getTotalAmount()
    {
        $totalAmount = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cartItem) {
                $totalAmount++;
            }
        }

        return $totalAmount;
    }
}