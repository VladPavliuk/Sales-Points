<?php

class MainController extends Controller
{

    public function viewHomePageAction()
    {
        $limitOfProducts = 1;

        $listOfSubcategoriesId = $this->categoryModel->getSubCategoriesIdOfParentCategory(0);
        $categoryProductsList = $this->productModel->getCategoryAndSubCategoriesProducts($listOfSubcategoriesId, $limitOfProducts);

        $this->smarty->assign('lastAddedProductInCategories', $categoryProductsList);

        $this->smarty->display("shop/homePage.tpl");
    }

    public function viewContactsAction()
    {
        $this->smarty->display("shop/contactsPage.tpl");
    }
}