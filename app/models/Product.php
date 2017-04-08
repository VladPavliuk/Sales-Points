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
     * Return list of one product of each category.
     *
     */
    public function getProductFromEachCategory()
    {
        $categoryModel = new Category();
        $listOfIDofAllCategories = $categoryModel->getListOfIdOfAllCategories();
        $listOfProductsFromEachCategory = [];

        foreach ($listOfIDofAllCategories as $key => $categoryId) {

            $sqlQuery = "SELECT * FROM `products` WHERE `category_id` = {$categoryId} LIMIT 1";
            $queryResult = $this->dataBase->query($sqlQuery);

            $product = $this->formProductsList($queryResult);
            if(empty($product)) continue;

            $listOfProductsFromEachCategory[] = $product[1];
        }

        return $listOfProductsFromEachCategory;
    }

    /**
     * Return chuck of products from list of products from each category.
     *
     * @param $maxIdOfProductInList
     * @return array
     */
    public function getMoreProductFromEachCategory($maxIdOfProductInList)
    {
        $productListOfEachCategory = $this->getProductFromEachCategory();
        $chunkSizeOfAddedProducts = 6;
        $maxIdOfProductInList++;

        return array_slice($productListOfEachCategory, $maxIdOfProductInList, $chunkSizeOfAddedProducts, true);
    }

    /**
     * Return list of category products.
     *
     * @param $categoryId
     * @return array
     */
    public function getCategoryProducts($categoryId)
    {
        $limitOfProducts = 10;

        $sqlQuery = "SELECT * FROM `products` WHERE `category_id` = {$categoryId} ORDER BY `upload_time` DESC LIMIT {$limitOfProducts}";

        $queryResult = $this->dataBase->query($sqlQuery);

        $categoryProductsList = $this->formProductsList($queryResult);

        return empty($categoryProductsList) ? null : $categoryProductsList;
    }

    /**
     * Return list of product of selected category and all subcategories.
     *
     * @param $categoryId
     * @param $limitOfProducts
     * @return array
     */
    public function getSubCategoriesProducts($categoryId, $limitOfProducts = 12)
    {
        $limitOfProducts = $limitOfProducts > 12 ? 12 : $limitOfProducts;

        $categoryModel = new Category();
        $categoryProductsList = [];
        $subCategoriesList = $categoryModel->getSubCategoriesIdOfParentCategory($categoryId);

        foreach ($subCategoriesList as $subCategoryId) {
            $sqlQuery = "SELECT * FROM `products` WHERE `category_id` = {$subCategoryId} ORDER BY `upload_time` DESC LIMIT {$limitOfProducts}";
            $queryResult = $this->dataBase->query($sqlQuery);

            if ($productsList = $this->formProductsList($queryResult)) {
                $categoryProductsList[$subCategoryId] = $productsList;
            }
        }

        return empty($categoryProductsList) ? null : $categoryProductsList;
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

        $sqlQuery = "SELECT * FROM `products` ORDER BY `id` DESC LIMIT {$limitOfProducts}";
        $queryResult = $this->dataBase->query($sqlQuery);

        $lastProductsList = $this->formProductsList($queryResult);

        return $lastProductsList;
    }

    /**
     * Return random products for footer.
     *
     * @param int $amountOfRandomProducts
     * @return array
     */
    public function getRandomProductsList($amountOfRandomProducts = 9)
    {
        $amountOfRandomProducts = $amountOfRandomProducts > 9 ? 9 : $amountOfRandomProducts;

        $sqlQuery = "SELECT * FROM `products` ORDER BY RAND() DESC LIMIT {$amountOfRandomProducts}";
        $queryResult = $this->dataBase->query($sqlQuery);

        $randomProductsList = $this->formProductsList($queryResult);

        return $randomProductsList;
    }

    /**
     * Return few last added products list from selected id.
     *
     * @param $productsAmount
     * @param $minProductsId
     * @return array
     */
    public function getMoreNewProducts($productsAmount, $minProductsId)
    {
        if ($minProductsId == $this->getOldestProduct()) return [];

        $productsAmount = $productsAmount > 10 ? 10 : $productsAmount;

        $sqlQuery = " SELECT * FROM `products` 
                      WHERE `id`<{$minProductsId} 
                      ORDER BY `id` DESC LIMIT {$productsAmount}";
        $queryResult = $this->dataBase->query($sqlQuery);

        $moreNewProductsList = $this->formProductsList($queryResult);

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

    /**
     * Create list of products.
     * Require sql query result.
     *
     * @param $queryResult
     * @return array
     */
    private function formProductsList($queryResult)
    {
        $currencyModelObject = new Currency();
        $productList = [];

        $i = 1;
        while ($tableRow = $queryResult->fetch()) {

            if(empty($tableRow)) continue;

            $productList[$i]["id"] = $tableRow["id"];
            $productList[$i]["category_id"] = $tableRow["category_id"];
            $productList[$i]["product_title"] = $tableRow["product_title"];
            $productList[$i]["price"] = $currencyModelObject->getPriceInCurrentCurrency($tableRow["price"]);
            $productList[$i]["main_image"] = $tableRow["main_image"];
            $productList[$i]["status"] = $tableRow["status"];
            $productList[$i]["category"] = $this->getParentCategoryTitleOfSingleProduct($tableRow["id"]);

            $i++;
        }

        return $productList;
    }

    private function getOldestProduct()
    {

        $sqlQuery = "SELECT MIN(id) from `products`";

        $sqlResult = $this->dataBase->query($sqlQuery);

        return $sqlResult->fetch()["MIN(id)"];
    }

}