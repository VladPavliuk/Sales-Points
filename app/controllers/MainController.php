<?php

class MainController extends Controller
{

    public function viewHomePageAction()
    {
        $limitOfProducts = 1;
        $productModelObject = new Product();
        $categoryModelObject = new Category();

        $listOfSubcategoriesId = $categoryModelObject->getSubCategoriesIdOfParentCategory(0);
        $categoryProductsList = $productModelObject->getCategoryAndSubCategoriesProducts($listOfSubcategoriesId, $limitOfProducts);

        $this->smarty->assign('lastAddedProductInCategories', $categoryProductsList);

        $this->smarty->display("shop/homePage.tpl");
    }

    public function viewContactsAction()
    {
        $this->smarty->display("shop/contactsPage.tpl");
    }
}