<?php

class CategoryController extends Controller
{
    public function viewProductsInCategoryAction($categoryId)
    {
        $limitOfProducts = 10;

        $listOfSubcategoriesId = $this->categoryModel->getSubCategoriesIdOfParentCategory($categoryId);
        $listOfSubcategoriesId[] = $categoryId;

        $categoryProductsList = $this->productModel->getCategoryAndSubCategoriesProducts($listOfSubcategoriesId, $limitOfProducts);

        $this->smarty->assign("categoryProductsList", $categoryProductsList);

        $this->smarty->display("shop/categoryPage.tpl");
    }
}