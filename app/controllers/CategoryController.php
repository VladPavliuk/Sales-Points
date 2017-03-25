<?php

class CategoryController extends Controller
{
    /**
     * Render products in category and subcategories.
     *
     * @param $categoryId
     */
    public function viewProductsInCategoryAction($categoryId)
    {
        $limitOfProducts = 12;

        $listOfSubcategoriesId = $this->categoryModel->getSubCategoriesIdOfParentCategory($categoryId);
        $listOfSubcategoriesId[] = $categoryId;

        $categoryProductsList = $this->productModel->getCategoryAndSubCategoriesProducts($listOfSubcategoriesId, $limitOfProducts);

        $this->smarty->assign("categoryProductsList", $categoryProductsList);

        $this->smarty->display("shop/categoryPage.tpl");
    }
}