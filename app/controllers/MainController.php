<?php

class MainController
{
    public function indexAction()
    {
        // Smarty initialization
        $smarty = SmartyRun::connect();

        $parentCategoriesList = $this->getParentCategories();

        $smarty->assign('parentCategoriesList', $parentCategoriesList);

        $smarty->display("contents/welcome.tpl");
    }

    private function getParentCategories()
    {
        $category = new Category();
        $parentCategoriesList = $category->getParentCategories();

        return $parentCategoriesList;
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