<?php

class Category extends Model
{
    private $subCategoriesIdList = [];

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
     * Parent category has `parent_category` equal to 0
     *
     * @return array
     */
    public function getParentCategories()
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = 0");

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
     * Return list of id of all subcategories of selected category
     *
     * @param $parentCategoryId
     * @return array
     */
    public function getSubCategoriesIdOfParentCategory($parentCategoryId)
    {
        $queryResult = $this->dataBase->query("SELECT `id` FROM `categories` WHERE `parent_category_id` = {$parentCategoryId}");

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