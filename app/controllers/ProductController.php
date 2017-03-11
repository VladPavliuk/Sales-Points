<?php

class ProductController extends Controller
{
    public function indexAction($productId)
    {
        $this->smarty->assign('singleProductItem', $this->getSingleProduct($productId));

        $this->smarty->display("contents/productPage.tpl");
    }

    private function getSingleProduct($productId)
    {
        $productModelObject = new Product();
        $singleProductItem = $productModelObject->getSingleProduct($productId);

        return $singleProductItem;
    }
}