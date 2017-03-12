<?php

class Category extends Model
{
    public function getSingleCategory($categoryId)
    {
        $categoryId = intval($categoryId);

        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `id` = {$categoryId}");

        $singleCategory = $queryResult->fetch();
        $singleCategory["children_category"] = $this->getChildrenCategory($categoryId);

        return $singleCategory;
    }

    public function getParentCategories()
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = 0");

        $parentCategoriesList = [];
        $i = 1;

        while($row = $queryResult->fetch()) {
            $parentCategoriesList[$i++] = $row;
        }

        return $parentCategoriesList;
    }

    public function getCategoriesTree()
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = 0");

        $parentCategoriesList = [];
        $i = 1;

        while($row = $queryResult->fetch()) {

            $childrenCategory = $this->getChildrenCategory($row["id"]);

            if($childrenCategory) {
                $row["children_category"] = $childrenCategory;
            }

            $parentCategoriesList[$i++] = $row;
        }

        return $parentCategoriesList;
    }

    public function getChildrenCategory($categoryId)
    {
        $queryResult = $this->dataBase->query("SELECT * FROM `categories` WHERE `parent_category_id` = {$categoryId}");

        $childrenCategory = [];
        $i = 1;
        while($row = $queryResult->fetch()) {
            $childrenCategory[$i++] = $row;
        }

        return $childrenCategory;
    }
}