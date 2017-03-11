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
        $lastAddedProducts = $productModelObject->getLastAddedProducts(2);

        return $lastAddedProducts;
    }

    private function getAllItems()
    {
        $mainModel = new Main();
        $mainModel->getAllItems();
    }

    private function getSingleItem($id)
    {
        $mainModel = new Main();
        $mainModel->getSingleItem($id);
    }
}