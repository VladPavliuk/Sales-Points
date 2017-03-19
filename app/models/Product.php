<?php

class Product extends Model
{
    /**
     * Return list of product of selected category and all subcategories.
     *
     * @param $subCategoriesList
     * @param $limitOfProducts
     * @return array
     */
    public function getCategoryAndSubCategoriesProducts($subCategoriesList, $limitOfProducts = 20)
    {
        $limitOfProducts = $limitOfProducts > 20 ? 20 : $limitOfProducts;

        $categoryProductsList = [];
        $currentLanguage = $_SESSION["language"];

        $currencyModelObject = new Currency();
        $i = 0;

        foreach($subCategoriesList as $subCategoryId) {
            $sqlQuery = "SELECT * FROM `products` WHERE `category_id` = {$subCategoryId} ORDER BY `upload_time` DESC LIMIT {$limitOfProducts}";
            $queryResult = $this->dataBase->query($sqlQuery);

            while($tableRow = $queryResult->fetch()) {

                $categoryProductsList[$i]["id"] = $tableRow["id"];
                $categoryProductsList[$i]["category_id"] = $tableRow["category_id"];
                $categoryProductsList[$i]["product_title"] = $tableRow["product_title"];
                $lastProductsList[$i]["description"] = $tableRow["description_{$currentLanguage}"];
                $categoryProductsList[$i]["price"] = $currencyModelObject->getPriceInCurrentCurrency($tableRow["price"]);
                $categoryProductsList[$i]["main_image"] = $tableRow["main_image"];
                $categoryProductsList[$i]["status"] = $tableRow["status"];
                $categoryProductsList[$i]["upload_time"] = $tableRow["upload_time"];
                $categoryProductsList[$i]["category"] = $this->getParentCategoryTitleOfSingleProduct($tableRow["id"]);

                $i++;
            }
        }

       return $categoryProductsList;
    }

    /**
     * Return one product from data base.
     * Require Id of one product in data base table.
     *
     * @param $productId
     * @return array
     */
    public function getSingleProduct($productId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `products` WHERE id = {$productId}");
        $productFromDataBase = $queryResult->fetch();
        $currentLanguage = $_SESSION["language"];

        $currencyModelObject = new Currency();

        $singleProductItem["id"] = $productFromDataBase["id"];
        $singleProductItem["category_id"] = $productFromDataBase["category_id"];
        $singleProductItem["product_title"] = stripslashes($productFromDataBase["product_title"]);
        $singleProductItem["description"] = stripslashes($productFromDataBase["description_{$currentLanguage}"]);
        $singleProductItem["price"] = $currencyModelObject->getPriceInCurrentCurrency($productFromDataBase["price"]);
        $singleProductItem["main_image"] = stripslashes($productFromDataBase["main_image"]);
        $singleProductItem["other_images"] = json_decode($productFromDataBase["other_images"]);
        $singleProductItem["status"] = $productFromDataBase["status"];
        $singleProductItem["upload_time"] = $productFromDataBase["upload_time"];
        $singleProductItem["category"] = $this->getParentCategoryTitleOfSingleProduct($singleProductItem["id"]);

        return $singleProductItem;
    }

    /**
     * Return list of last add products in data base table.
     *
     * @param int $limitOfProducts
     * @return array
     */
    public function getLastAddedProducts($limitOfProducts = 20)
    {
        $limitOfProducts = $limitOfProducts > 20 ? 20 : $limitOfProducts;

        $queryResult = $this->dataBase->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT {$limitOfProducts}");
        $currentLanguage = $_SESSION["language"];

        $currencyModelObject = new Currency();
        $lastProductsList = [];
        $i = 1;
        while($tableRow = $queryResult->fetch()) {

            $lastProductsList[$i]["id"] = $tableRow["id"];
            $lastProductsList[$i]["category_id"] = $tableRow["category_id"];
            $lastProductsList[$i]["product_title"] = $tableRow["product_title"];
            $lastProductsList[$i]["description"] = $tableRow["description_{$currentLanguage}"];
            $lastProductsList[$i]["price"] = $currencyModelObject->getPriceInCurrentCurrency($tableRow["price"]);
            $lastProductsList[$i]["main_image"] = $tableRow["main_image"];
            $lastProductsList[$i]["other_images"] = json_decode($tableRow["other_images"]);
            $lastProductsList[$i]["status"] = $tableRow["status"];
            $lastProductsList[$i]["upload_time"] = $tableRow["upload_time"];
            $lastProductsList[$i]["category"] = $this->getParentCategoryTitleOfSingleProduct($tableRow["id"]);

            $i++;
        }

        return $lastProductsList;
    }

    public function getMoreNewProducts($productsAmount, $minProductsId)
    {
        $productsAmount = $productsAmount > 10 ? 10 : $productsAmount;

        $sqlQuery = " SELECT * FROM `products` 
                              WHERE `id`<{$minProductsId} 
                              ORDER BY `id` DESC LIMIT {$productsAmount}";

        $sqlResult = $this->dataBase->query($sqlQuery);

        $currencyModelObject = new Currency();
        $moreNewProductsList = [];
        $i = 0;

        while($tableRow = $sqlResult->fetch()) {

            $moreNewProductsList[$i]["id"] = $tableRow["id"];
            $moreNewProductsList[$i]["category_id"] = $tableRow["category_id"];
            $moreNewProductsList[$i]["product_title"] = $tableRow["product_title"];
            $moreNewProductsList[$i]["price"] = $currencyModelObject->getPriceInCurrentCurrency($tableRow["price"]);
            $moreNewProductsList[$i]["main_image"] = $tableRow["main_image"];
            $moreNewProductsList[$i]["status"] = $tableRow["status"];
            $moreNewProductsList[$i]["upload_time"] = $tableRow["upload_time"];
            $moreNewProductsList[$i]["category"] = $this->getParentCategoryTitleOfSingleProduct($tableRow["id"]);

            $i++;
        }

        return $moreNewProductsList;
    }

    /**
     * Sort list of products by added time.
     * Last added products on top of return list.
     *
     * @param $productsList
     * @return mixed
     */
    public function sortProductsListByTime(&$productsList)
    {
        arsort($productsList);

        return $productsList;
    }

    /**
     * Return title of category which refers the id of product.
     *
     * @param $productId
     * @return string
     */
    private function getParentCategoryTitleOfSingleProduct($productId)
    {
        $queryResult = $this->dataBase->query("SELECT `category_id` FROM `products` WHERE `id` = {$productId}");
        $category_id = $queryResult->fetch()["category_id"];

        $queryResult = $this->dataBase->query("SELECT `category_english` FROM `categories` WHERE `id` = {$category_id}");
        $category_title = $queryResult->fetch()["category_english"];

        $category_title = trim($category_title);
        $category_title = strtolower($category_title);
        $category_title = str_replace(" ", "_", $category_title);

        return $category_title;
    }

}