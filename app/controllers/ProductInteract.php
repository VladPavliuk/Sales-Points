<?php

trait ProductInteract
{
    public function getSingleProduct($productId)
    {
        $productModelObject = new Product();
        $singleProductItem = $productModelObject->getSingleProduct($productId);

        return $singleProductItem;
    }

    public function getLastAddedProducts($limitOfProducts)
    {
        $productModelObject = new Product();
        $lastAddedProducts = $productModelObject->getLastAddedProducts($limitOfProducts);

        return $lastAddedProducts;
    }
}