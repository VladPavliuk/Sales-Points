<?php

class MainController extends Controller
{
    public function indexAction()
    {
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree());
        $this->smarty->assign('lastAddedProducts', $this->getLastAddedProducts());

        $this->smarty->display("contents/homePage.tpl");
    }

    private function getCategoriesTree()
    {
        $categoryModelObject = new Category();
        $parentCategoriesList = $categoryModelObject->getCategoriesTree();

        return $parentCategoriesList;
    }

    private function getLastAddedProducts()
    {
        $productModelObject = new Product();
        $lastAddedProducts = $productModelObject->getLastAddedProducts(8);

        return $lastAddedProducts;
    }
}