<?php

class Product extends Model
{
    public function getCategoryProducts($subCategoriesList, $limitOfProducts)
    {
        $limitOfProducts = $limitOfProducts > 15 ? 15 : $limitOfProducts;

        $categoryProductsList = [];

        foreach($subCategoriesList as $subCategoryId) {
            $sqlQuery = "SELECT * FROM `products` WHERE `category_id` = {$subCategoryId} ORDER BY `updated_time` DESC LIMIT {$limitOfProducts}";
            $queryResult = $this->dataBase->query($sqlQuery);

            while($row = $queryResult->fetch()) {

                $categoryProductsList[] = $row;
            }
        }

       return $categoryProductsList;
    }

    public function getSingleProduct($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE id = {$productId}");

        $singleProductItem = $queryResult->fetch();

        return $singleProductItem;
    }

    public function getLastAddedProducts($limitOfProducts = 2)
    {
        $limitOfProducts = $limitOfProducts > 10 ? 10 : $limitOfProducts;

        $queryResult = $this->dataBase->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT {$limitOfProducts}");

        $lastProductsList = [];
        $i = 1;
        while($row = $queryResult->fetch()) {
            $lastProductsList[$i++] = $row;
        }

        return $lastProductsList;
    }
}