<?php

class Search extends Model
{
    private $searchingList = [];

    public function getSearchingList($searchRequest)
    {
        $searchRequest = trim($searchRequest);

        $this->findProductsByFullInput($searchRequest);

        $this->findProductsBySubStr($searchRequest);

        $this->deleteRepeatingProducts();

        // Debug::viewArray($this->searchingList);

        return $this->searchingList;
    }

    private function findProductsByFullInput($searchRequest)
    {
        $sqlQuery = "SELECT * FROM `products` 
                     WHERE `product_title` = '{$searchRequest}'";

        $queryResult = $this->dataBase->query($sqlQuery);

        $this->formSearchingProductsList($queryResult);
    }

    private function findProductsBySubStr($searchRequest)
    {
        if (strlen($searchRequest) > 1) {
            $sqlQuery = "SELECT * FROM `products` 
                     WHERE 
                     `product_title` LIKE '%{$searchRequest}'
                     OR `product_title` LIKE '{$searchRequest}%'
                     OR `product_title` LIKE '%{$searchRequest}%'";

            $queryResult = $this->dataBase->query($sqlQuery);

            $this->formSearchingProductsList($queryResult);
        }
    }

    private function deleteRepeatingProducts()
    {
        $this->searchingList = array_unique($this->searchingList, SORT_REGULAR);
    }

    /**
     * Create list of products.
     * Require sql query result.
     *
     * @param $queryResult
     * @return array
     */
    private function formSearchingProductsList($queryResult)
    {
        $currencyModel = new Currency();
        $productModel = new Product();
        $productList = [];

        $i = 1;
        while ($tableRow = $queryResult->fetch()) {

            if (empty($tableRow)) continue;

            $productList[$i]["id"] = $tableRow["id"];
            $productList[$i]["category_id"] = $tableRow["category_id"];
            $productList[$i]["product_title"] = $tableRow["product_title"];
            $productList[$i]["price"] = $currencyModel->getPriceInCurrentCurrency($tableRow["price"]);
            $productList[$i]["main_image"] = $tableRow["main_image"];
            $productList[$i]["status"] = $tableRow["status"];
            $productList[$i]["category"] = $productModel->getParentCategoryTitleOfSingleProduct($tableRow["id"]);

            $this->searchingList[] = $productList[$i];

            $i++;
        }
    }
}