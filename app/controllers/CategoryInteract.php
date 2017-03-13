<?php

trait CategoryInteract
{
    public function getParentCategories()
    {
        $categoryModelObject = new Category();
        $parentCategoriesList = $categoryModelObject->getParentCategories();

        return $parentCategoriesList;
    }

    public function getCategoryProducts($categoryId, $limitOfProducts)
    {
        $categoryModelObject = new Category();
        $subCategoriesList = $categoryModelObject->getSubCategoriesIdOfParentCategory($categoryId);
        $subCategoriesList[] = $categoryId;

        $categoryModelObject = new Product();
        $categoryProductsList = $categoryModelObject->getCategoryProducts($subCategoriesList, $limitOfProducts);

        $categoryProductsList = $this->sortProductsListByTime($categoryProductsList);


        return $categoryProductsList;
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

}