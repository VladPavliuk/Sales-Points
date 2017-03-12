<?php

class CategoryController extends Controller
{
    public function viewAction($categoryId)
    {
        $this->smarty->assign("singleCategory", $this->getSingleCategory($categoryId));

        $this->smarty->display("contents/categoryPage.tpl");
    }

    private function getSingleCategory($categoryId)
    {
        $categoryModelObject = new Category();
        $singleCategory = $categoryModelObject->getSingleCategory($categoryId);

        return $singleCategory;
    }
}