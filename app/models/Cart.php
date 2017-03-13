<?php

class Cart extends Model
{
    public function addToCart($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE `id` = {$productId} LIMIT 1");

        $_SESSION['cart'][] = $queryResult->fetch();
    }

    public function deleteFromCart($productId)
    {
        if(isset($_SESSION['cart'])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;
        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $cartItem) {
                $totalPrice += floatval($cartItem["price"]);
            }
        }

        return $totalPrice;
    }

    public function getTotalAmount()
    {
        $totalAmount = 0;
        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $cartItem) {
                $totalAmount++;
            }
        }

        return $totalAmount;
    }
}