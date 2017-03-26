<?php

class SearchController extends Controller
{
    /**
     * Render search page.
     *
     */
    public function viewSearchPageAction($searchText = null)
    {
        $searchingList = $this->searchModel->getSearchingList($searchText);

        $this->smarty->assign("searchingList", $searchingList);
        $this->smarty->assign("searchRequest", $searchText);

        $this->smarty->display("shop/searchPage.tpl");
    }

    /**
     * Return list of finding result.
     *
     */
    public function searchProductsAction($searchText)
    {
        echo $searchText;

        //echo json_encode($productsList);
    }
}