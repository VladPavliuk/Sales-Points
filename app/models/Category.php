<?php

class Category extends Model
{
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
            $childrenCategory[$i++] = $row["category"];
        }

        return $childrenCategory;
    }
}