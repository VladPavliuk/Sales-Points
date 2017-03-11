<?php

class Product extends Controller
{
    private $dataBase = false;

    public function __construct()
    {
        $this->dataBase = DataBase::connect();
    }

    public function getSingleProduct($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE id = {$productId}");

        $singleProductItem = $queryResult->fetch();

        return $singleProductItem;
    }

    public function getLastAddedProducts($limitOfProducts = 2)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT {$limitOfProducts}");

        $lastProductsList = [];
        $i = 1;
        while($row = $queryResult->fetch()) {
            $lastProductsList[$i++] = $row;
        }

        return $lastProductsList;
    }
}