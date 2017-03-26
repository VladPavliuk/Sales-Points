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
        $categoryProductsList = [];

        if ($categoryRootProductsList = $this->productModel->getCategoryProducts($categoryId)) {
            $categoryProductsList["root_products"] = $categoryRootProductsList;
        }

        if ($subCategoriesListProducts = $this->productModel->getSubCategoriesProducts($categoryId, $limitOfProducts)) {
            $categoryProductsList["subcategories_products"] = $subCategoriesListProducts;
        }

        $this->smarty->assign("categoriesProductsList", $categoryProductsList);

        $this->smarty->display("shop/categoryPage.tpl");
    }
}