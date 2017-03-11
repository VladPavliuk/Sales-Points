<?php

class Category
{
    public function getParentCategories()
    {
        $db = DataBase::connect();

        $queryResult = $db->query("SELECT * FROM `categories` WHERE `parent_category_id` = 0");

        $parentCategoriesList = [];
        $i = 1;

        while($row = $queryResult->fetch()) {
            $parentCategoriesList[$i]["id"] = $row["id"];
            $parentCategoriesList[$i]["category"] = $row["category"];

            $i++;
        }

        return $parentCategoriesList;
    }
}