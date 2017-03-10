<?php

class MainController
{
    public function indexAction()
    {
        // Smarty initialization
        $smarty = SmartyRun::connect();

        $smarty->display("contents/welcome.tpl");
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