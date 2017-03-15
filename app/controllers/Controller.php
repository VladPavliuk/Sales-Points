<?php

class Controller
{
    use CartInteract, CategoryInteract, ProductInteract;

    protected $smarty = false;

    public function __construct()
    {
        // Smarty initialization
        $this->smarty = SmartyRun::connect();

        $this->setDefaultLanguage();

        $fileWithLanguagesText = $_SESSION["language"] . ".conf";

        $this->smarty->configLoad($fileWithLanguagesText, 'header');
    }

    protected function setDefaultLanguage()
    {
        if (empty($_SESSION["language"])) {
            $_SESSION["language"] = "ukrainian";
        }
    }
}