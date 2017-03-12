<?php

class Cart extends Model
{
    public function addToCart($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE `id` = {$productId} LIMIT 1");

        while($row = $queryResult->fetch()) {
            $_SESSION["cart"][] = $row;
        }

        print_r($_SESSION["cart"]);
    }

    public function getCart()
    {

    }

    public function getTotalPrice()
    {
        $totalPrice = 0;
        if(isset($_SESSION["cart"])) {
            foreach($_SESSION["cart"] as $cartItem) {
                $totalPrice += floatval($cartItem["price"]);
            }
        }

        return $totalPrice;
    }

    public function getTotalAmount()
    {
        $totalAmount = 0;
        if(isset($_SESSION["cart"])) {
            foreach($_SESSION["cart"] as $cartItem) {
                $totalAmount++;
            }
        }

        return $totalAmount;
    }
}