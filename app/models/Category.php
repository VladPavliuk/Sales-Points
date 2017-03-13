<?php

class Category extends Model
{
    private $subCategoriesIdList = [];

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