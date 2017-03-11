<?php

class MainController
{
    private $smarty = false;

    public function __construct()
    {
        // Smarty initialization
        $this->smarty = SmartyRun::connect();
    }

    public function indexAction()
    {
        $this->smarty->assign('parentCategoriesList', $this->getCategoriesTree());
        $this->smarty->assign('lastAddedProducts', $this->getLastAddedProducts());

        $this->smarty->display("contents/welcome.tpl");
    }

    private function getCategoriesTree()
    {
        $category = new Category();
        $parentCategoriesList = $category->getCategoriesTree();

        return $parentCategoriesList;
    }

    private function getLastAddedProducts()
    {
        $product = new Product();
        $lastAddedProducts = $product->getLastAddedProducts(2);

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