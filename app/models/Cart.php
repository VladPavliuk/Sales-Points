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