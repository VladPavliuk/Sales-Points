<?php

trait CategoryInteract
{
    public function getCategoriesTree()
    {
        $categoryModelObject = new Category();
        $parentCategoriesList = $categoryModelObject->getCategoriesTree();

        return $parentCategoriesList;
    }
}