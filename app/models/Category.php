<?php

class Category extends Model
{
    private $subCategoriesIdList = [];

    /**
     * Return single category title.
     *
     * @param $categoryId
     * @return mixed
     */
    public function getSingleCategoryTitleById($categoryId)
    {
        $currentLanguage = $_SESSION["language"];
        $singleCategory = $this->getSingleCategoryById($categoryId);

        return $singleCategory["category_{$currentLanguage}"];
    }

    /**
     * Return single category title on english.
     *
     * @param $categoryId
     * @return mixed
     */
    public function getSingleCategoryTitleOnEnglishById($categoryId)
    {
        $singleCategory = $this->getSingleCategoryById($categoryId);

        return $singleCategory["category_english"];
    }

    /**
     * Return single category.
     *
     * @param $categoryId
     * @return mixed
     */
    public function getSingleCategoryById($categoryId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `id` = {$categoryId}");
        $tableRow = $queryResult->fetch();

        $singleCategory["id"] = $tableRow["id"];
        $singleCategory["parent_category_id"] = $tableRow["parent_category_id"];
        $singleCategory["category_english"] = $tableRow["category_english"];
        $singleCategory["category_ukrainian"] = $tableRow["category_ukrainian"];
        $singleCategory["category_russian"] = $tableRow["category_russian"];
        $singleCategory["created_time"] = $tableRow["created_time"];

        return $singleCategory;
    }

    /**
     * Return list of all categories.
     *
     */
    public function getListOfAllCategories()
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories`");
        $categoriesList = [];
        $i = 0;

        while ($tableRow = $queryResult->fetch()) {
            $categoriesList[$i]["id"] = $tableRow["id"];
            $categoriesList[$i]["parent_category_id"] = $tableRow["parent_category_id"];
            $categoriesList[$i]["category_english"] = $tableRow["category_english"];
            $categoriesList[$i]["category_ukrainian"] = $tableRow["category_ukrainian"];
            $categoriesList[$i]["category_russian"] = $tableRow["category_russian"];
            $categoriesList[$i]["created_time"] = $tableRow["created_time"];

            $i++;
        }

        return $categoriesList;
    }

    /**
     * Return categories tree.
     *
     * @param $parentCategoryId
     * @return array
     */
    public function getCategoriesTree($parentCategoryId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = {$parentCategoryId}");
        $categoriesTree = [];
        $i = 0;

        while ($row = $queryResult->fetch()) {
            $categoriesTree[$i] = $row;

            if ($this->getChildrenCategories($row["id"])) {
                $categoriesTree[$i]["children_categories"] = $this->getChildrenCategories($row["id"]);
            }

            $i++;
        }

        return $categoriesTree;
    }

    /**
     * Return all parent categories.
     * Parent category has `parent_category` equal to 0.
     *
     * @return array
     */
    public function getParentCategories($limitOfParentCategories = 30)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = 0 LIMIT {$limitOfParentCategories}");

        $parentCategoriesList = [];
        $i = 0;

        while ($tableRow = $queryResult->fetch()) {
            $parentCategoriesList[$i]["id"] = $tableRow["id"];
            $parentCategoriesList[$i]["parent_category_id"] = $tableRow["parent_category_id"];
            $parentCategoriesList[$i]["category_english"] = $tableRow["category_english"];
            $parentCategoriesList[$i]["category_ukrainian"] = $tableRow["category_ukrainian"];
            $parentCategoriesList[$i]["category_russian"] = $tableRow["category_russian"];

            $i++;
        }

        return $parentCategoriesList;
    }

    /**
     * Return list of if of each category.
     *
     */
    public function getListOfIdOfAllCategories()
    {
        $sqlQuery = "SELECT `id` FROM `categories` ";
        $queryResult = $this->dataBase->query($sqlQuery);
        $listOfIDofAllCategories = [];

        while($tableRow = $queryResult->fetch()) {
            $listOfIDofAllCategories[] = $tableRow["id"];
        }

        return $listOfIDofAllCategories;
    }

    /**
     * Return list of id of all subcategories of selected category.
     *
     * @param $parentCategoryId
     * @return array
     */
    public function getSubCategoriesIdOfParentCategory($parentCategoryId)
    {
        $parentCategoryId = intval($parentCategoryId);

        $sqlQuery = "SELECT `id` FROM `categories` WHERE `parent_category_id` = {$parentCategoryId}";

        $queryResult = $this->dataBase->query($sqlQuery);

        while ($tableRow = $queryResult->fetch()) {

            $this->subCategoriesIdList[] = $tableRow["id"];
            $this->getSubCategoriesIdOfParentCategory($tableRow["id"]);
        }

        return $this->subCategoriesIdList;
    }

    /**
     * Return all subcategories of selected category.
     *
     * @param $parentCategoryId
     * @return array
     */
    private function getChildrenCategories($parentCategoryId)
    {
        $parentCategoryId = intval($parentCategoryId);
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = {$parentCategoryId}");

        $childrenCategories = [];
        $i = 0;

        while ($row = $queryResult->fetch()) {
            $childrenCategories[$i] = $row;

            if ($this->getChildrenCategories($row["id"])) {
                $childrenCategories[$i]["children_categories"] = $this->getChildrenCategories($row["id"]);
            }
            $i++;
        }

        return $childrenCategories;
    }

}