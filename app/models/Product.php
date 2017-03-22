<?php

class Product extends Model
{
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

        foreach ($subCategoriesList as $subCategoryId) {
            $sqlQuery = "SELECT * FROM `products` WHERE `category_id` = {$subCategoryId} ORDER BY `upload_time` DESC LIMIT {$limitOfProducts}";
            $queryResult = $this->dataBase->query($sqlQuery);

            while ($tableRow = $queryResult->fetch()) {

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
        while ($tableRow = $queryResult->fetch()) {

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

    public function getRandomProductsList($amountOfRandomProducts = 9)
    {
        $amountOfRandomProducts = $amountOfRandomProducts > 9 ? 9 : $amountOfRandomProducts;

        $queryResult = $this->dataBase->query("SELECT * FROM `products` ORDER BY RAND() DESC LIMIT {$amountOfRandomProducts}");
        $currentLanguage = $_SESSION["language"];

        $currencyModelObject = new Currency();
        $randomProductsList = [];
        $i = 1;
        while ($tableRow = $queryResult->fetch()) {

            $randomProductsList[$i]["id"] = $tableRow["id"];
            $randomProductsList[$i]["category_id"] = $tableRow["category_id"];
            $randomProductsList[$i]["product_title"] = $tableRow["product_title"];
            $randomProductsList[$i]["description"] = $tableRow["description_{$currentLanguage}"];
            $randomProductsList[$i]["price"] = $currencyModelObject->getPriceInCurrentCurrency($tableRow["price"]);
            $randomProductsList[$i]["main_image"] = $tableRow["main_image"];
            $randomProductsList[$i]["other_images"] = json_decode($tableRow["other_images"]);
            $randomProductsList[$i]["status"] = $tableRow["status"];
            $randomProductsList[$i]["upload_time"] = $tableRow["upload_time"];
            $randomProductsList[$i]["category"] = $this->getParentCategoryTitleOfSingleProduct($tableRow["id"]);

            $i++;
        }

        return $randomProductsList;
    }

    public function getMoreNewProducts($productsAmount, $minProductsId)
    {
        if ($minProductsId == $this->getOldestProduct()) return [];
        //Debug::viewArray($minProductsId);
        $productsAmount = $productsAmount > 10 ? 10 : $productsAmount;

        $sqlQuery = " SELECT * FROM `products` 
                              WHERE `id`<{$minProductsId} 
                              ORDER BY `id` DESC LIMIT {$productsAmount}";

        $sqlResult = $this->dataBase->query($sqlQuery);

        $currencyModelObject = new Currency();
        $moreNewProductsList = [];
        $i = 0;

        while ($tableRow = $sqlResult->fetch()) {

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
    public function getParentCategoryTitleOfSingleProduct($productId)
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

    private function getOldestProduct()
    {

        $sqlQuery = "SELECT MIN(id) from `products`";

        $sqlResult = $this->dataBase->query($sqlQuery);

        return $sqlResult->fetch()["MIN(id)"];
    }

}