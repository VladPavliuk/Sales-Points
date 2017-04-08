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
        $limitOfProducts = 1;
        $categoryProductsList = [];

        $categoryProductsList["category_title"] = $this->categoryModel->getSingleCategoryTitleById($categoryId);

        if ($categoryRootProductsList = $this->productModel->getCategoryProducts($categoryId)) {
            $categoryProductsList["root_products"] = $categoryRootProductsList;
        }

        if ($subCategoriesListProducts = $this->productModel->getSubCategoriesProducts($categoryId, $limitOfProducts)) {
            $categoryProductsList["subcategories_products"] = $subCategoriesListProducts;
        }

        $this->smarty->assign("categoriesProductsList", $categoryProductsList);

        $this->smarty->display("shop/categoryPage.tpl");
    }

    public function getSubCategoriesProductsAction($category)
    {

    }
}