<?php

class MainController extends Controller
{

    /**
     * Render main page.
     *
     */
    public function viewHomePageAction()
    {
        $categoryProductsList = $this->productModel->getProductFromEachCategory();

        $this->smarty->assign('mainPageProducts', $categoryProductsList);

        $this->smarty->display("shop/homePage.tpl");
    }

    /**
     * Return chunk of products for main page.
     * Action for page button "View More".
     *
     * @param $maxIdOfProductInList
     */
    public function getMoreProductFromEachCategoryAction($maxIdOfProductInList)
    {
        $chunkOfProducts = $this->productModel->getMoreProductFromEachCategory($maxIdOfProductInList);

        echo json_encode($chunkOfProducts, JSON_FORCE_OBJECT);
    }

    /**
     * Render about page.
     *
     */
    public function viewContactsAction()
    {
        $this->smarty->display("shop/contactsPage.tpl");
    }
}