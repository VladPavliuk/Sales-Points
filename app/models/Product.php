<?php

class Product extends Model
{
    public function getCategoryProducts($subCategoriesList, $limitOfProducts)
    {
        $limitOfProducts = $limitOfProducts > 15 ? 15 : $limitOfProducts;

        $categoryProductsList = [];
        $currencyModelObject = new Currency();
        foreach($subCategoriesList as $subCategoryId) {
            $sqlQuery = "SELECT * FROM `products` WHERE `category_id` = {$subCategoryId} ORDER BY `updated_time` DESC LIMIT {$limitOfProducts}";
            $queryResult = $this->dataBase->query($sqlQuery);

            $i = 1;
            while($row = $queryResult->fetch()) {

                $categoryProductsList[$i] = $row;
                $categoryProductsList[$i++]["price"] = $currencyModelObject->getPriceInCurrentCurrency($row["price"]);
            }
        }

       return $categoryProductsList;
    }

    public function getSingleProduct($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE id = {$productId}");

        $singleProductItem = $queryResult->fetch();

        $currencyModelObject = new Currency();
        $singleProductItem["price"] = $currencyModelObject->getPriceInCurrentCurrency($singleProductItem["price"]);

        return $singleProductItem;
    }

    public function getLastAddedProducts($limitOfProducts = 2)
    {
        $limitOfProducts = $limitOfProducts > 10 ? 10 : $limitOfProducts;

        $queryResult = $this->dataBase->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT {$limitOfProducts}");

        $currencyModelObject = new Currency();
        $lastProductsList = [];
        $i = 1;
        while($row = $queryResult->fetch()) {
            $lastProductsList[$i] = $row;
            $lastProductsList[$i++]["price"] = $currencyModelObject->getPriceInCurrentCurrency($row["price"]);
        }

        return $lastProductsList;
    }

}