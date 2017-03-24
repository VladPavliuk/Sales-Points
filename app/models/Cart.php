<?php

class Cart extends Model
{
    /**
     * Return list of all products in shopping cart.
     * price is converting in current currency.
     *
     * @return array|bool
     */
    public function getCartForRendering()
    {
        $cartForRendering = [];
        $currencyModelObject = new Currency();

        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $itemKeyInCart => $cartItem) {

                $convertedPrice = $currencyModelObject->getPriceInCurrentCurrency($cartItem["price"]);

                $cartForRendering[$itemKeyInCart]["id"] = $cartItem["id"];
                $cartForRendering[$itemKeyInCart]["category_id"] = $cartItem["category_id"];
                $cartForRendering[$itemKeyInCart]["product_title"] = $cartItem["product_title"];
                $cartForRendering[$itemKeyInCart]["description_english"] = $cartItem["description_english"];
                $cartForRendering[$itemKeyInCart]["description_ukraine"] = $cartItem["description_ukrainian"];
                $cartForRendering[$itemKeyInCart]["description_russian"] = $cartItem["description_russian"];
                $cartForRendering[$itemKeyInCart]["price"] = $convertedPrice;
                $cartForRendering[$itemKeyInCart]["main_image"] = $cartItem["main_image"];
                $cartForRendering[$itemKeyInCart]["status"] = $cartItem["status"];
                $cartForRendering[$itemKeyInCart]["upload_time"] = $cartItem["upload_time"];
            }

            return $cartForRendering;
        } else {
            return false;
        }
    }

    /**
     * Add one product to shopping cart.
     * Require id of product in data base table.
     *
     * @param $productId
     */
    public function addToCart($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE `id` = {$productId} LIMIT 1");

        $_SESSION['cart'][] = $queryResult->fetch();
    }

    /**
     * Remove one product from shopping cart.
     * Require id of product in shopping cart.
     *
     * @param $productId
     */
    public function deleteFromCart($productId)
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    /**
     * Return total price of all products in shopping cart.
     *
     * @return float|int|string
     */
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

    /**
     * Return summary of all products in shopping cart.
     *
     * @return int
     */
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