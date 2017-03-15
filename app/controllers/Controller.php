<?php

class Controller
{
    use CartInteract, CategoryInteract, ProductInteract;

    protected $smarty = false;

    public function __construct()
    {
        // Smarty initialization
        $this->smarty = SmartyRun::connect();

        $this->defineLanguagesList();
        $this->setDefaultLanguage();
        $this->defineRenderingLanguage();

        $fileWithLanguagesText = $_SESSION["language"] . ".conf";

        $this->smarty->configLoad($fileWithLanguagesText);
    }

    /**
     * Include Language model
     * and get languages from Data Base
     *
     */
    protected function defineLanguagesList()
    {
        require_once(MODELS_PATH . "Language.php");
        $languagesModelObject = new Language();
        $languagesList = $languagesModelObject->getLanguagesList();

        $this->smarty->assign('languagesList', $languagesList);
    }

    protected function setDefaultLanguage()
    {
        if (empty($_SESSION["language"])) {
            $_SESSION["language"] = "ukrainian";
        }
    }

    protected function defineRenderingLanguage()
    {
        if (isset($_SESSION["language"])) {
            $this->smarty->assign('renderLanguage', $_SESSION["language"]);
        }
    }
}