<?php

class Category extends Model
{
    private $subCategoriesIdList = [];

    public function getCategoriesTree($parentCategoryId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = {$parentCategoryId}");
        $categoriesTree = [];
        $i = 0;

        while($row = $queryResult->fetch()) {
            $categoriesTree[$i] = $row;

            if($this->getChildrenCategories($row["id"])) {
                $categoriesTree[$i]["children_categories"] = $this->getChildrenCategories($row["id"]);
            }

            $i++;
        }

        return $categoriesTree;

    }

    private function getChildrenCategories($parentCategoryId)
    {
        $parentCategoryId = intval($parentCategoryId);
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = {$parentCategoryId}");

        $childrenCategories = [];
        $i = 0;

        while($row = $queryResult->fetch()) {
            $childrenCategories[$i] = $row;

            if($this->getChildrenCategories($row["id"])) {
                $childrenCategories[$i]["children_categories"] = $this->getChildrenCategories($row["id"]);
            }
            $i++;
        }


        return $childrenCategories;
    }

    public function getParentCategories()
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = 0");

        $parentCategoriesList = [];

        while($row = $queryResult->fetch()) {
            $parentCategoriesList[] = $row;
        }

        return $parentCategoriesList;
    }

    public function getSubCategoriesIdOfParentCategory($parentCategoryId)
    {
        $queryResult = $this->dataBase->query("SELECT `id` FROM `categories` WHERE `parent_category_id` = {$parentCategoryId}");

        while($row = $queryResult->fetch()) {
            $this->subCategoriesIdList[] = $row["id"];
            $this->getSubCategoriesIdOfParentCategory($row["id"]);
        }

        return $this->subCategoriesIdList;
    }

}