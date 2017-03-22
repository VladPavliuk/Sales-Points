<?php

class Controller
{
    protected $smarty = false;

    public function __construct()
    {
        // Smarty initialization
        $this->smarty = SmartyRun::connect();

        $this->defineLanguagesList();
        $this->setDefaultLanguage("ukrainian");
        $this->defineRenderingLanguage();
        $this->loadLanguageText();

        $this->defineCurrencyList();
        $this->setDefaultCurrency("UAH");
        $this->defineRenderingCurrency();

        $this->defineDefaultSmartyVariables();
    }

    protected function defineDefaultSmartyVariables()
    {
        $cartModelObject = new Cart();
        $categoryModelObject = new Category();
        $productModelObject = new Product();

        $randomProductsList = $productModelObject->getRandomProductsList(9);

        $this->smarty->assign('parentCategoriesList', $categoryModelObject->getCategoriesTree(0));
        $this->smarty->assign('randomProductsList', $randomProductsList);

        $this->smarty->assign('totalPrice', $cartModelObject->getTotalPrice());
        $this->smarty->assign('totalAmount', $cartModelObject->getTotalAmount());
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

    /**
     * Set language when client first time come to web site
     *
     */
    protected function setDefaultLanguage($defaultLanguage)
    {
        if (empty($_SESSION["language"])) {
            $_SESSION["language"] = $defaultLanguage;
        }
    }

    protected function defineRenderingLanguage()
    {
        if (isset($_SESSION["language"])) {
            $this->smarty->assign('renderLanguage', $_SESSION["language"]);
        }
    }

    /**
     * Load config file which contains all text of selected language
     *
     */
    protected function loadLanguageText()
    {
        $fileWithLanguagesText = $_SESSION["language"] . ".conf";

        $this->smarty->configLoad($fileWithLanguagesText);
    }

    /**
     * Include Currency model
     * and get currency list from Data Base
     *
     */
    protected function defineCurrencyList()
    {
        require_once(MODELS_PATH . "Currency.php");
        $currencyModelObject = new Currency();
        $currencyList = $currencyModelObject->getCurrencyList();

        $this->smarty->assign('currencyList', $currencyList);
    }

    /**
     * Set language when client first time come to web site
     *
     */
    protected function setDefaultCurrency($defaultCurrency)
    {
        if (empty($_SESSION["currency"])) {
            $_SESSION["currency"] = $defaultCurrency;
        }
    }

    protected function defineRenderingCurrency()
    {
        if (isset($_SESSION["currency"])) {
            $this->smarty->assign('renderCurrency', $_SESSION["currency"]);
        }
    }

}