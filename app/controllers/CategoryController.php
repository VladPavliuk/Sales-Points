<?php

class CategoryController extends Controller
{
    public function viewProductsInCategoryAction($categoryId)
    {
        $limitOfProducts = 10;
        $categoryModelObject = new Category();
        $productModelObject = new Product();

        $listOfSubcategoriesId = $categoryModelObject->getSubCategoriesIdOfParentCategory($categoryId);
        $categoryProductsList = $productModelObject->getCategoryAndSubCategoriesProducts($listOfSubcategoriesId, $limitOfProducts);

        $this->smarty->assign("categoryProductsList", $categoryProductsList);

        $this->smarty->display("contents/categoryPage.tpl");
    }
}