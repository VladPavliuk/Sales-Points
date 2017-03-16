<?php

class Currency extends Model
{
    public function getPriceInCurrentCurrency($priceInDollars)
    {
        $currentCurrency = $_SESSION["currency"];

        $productPrice = $this->convertCurrency($priceInDollars, "USD", $currentCurrency);
        $renderCurrencySign = $this->getCurrencySign($_SESSION["currency"]);

        if ($renderCurrencySign == "$" || $renderCurrencySign == "€") {
            return "$renderCurrencySign " . $productPrice;
        }

        return $productPrice . " $renderCurrencySign";
    }

    public function getCurrencyList()
    {
        $sqlResponse = $this->dataBase->query("SELECT * FROM `currency`");

        $currencyList = [];
        while ($row = $sqlResponse->fetch()) {
            $currencyList[] = $row;
        }

        return $currencyList;
    }

    public function getCurrencySign($currency)
    {
        $currentLanguage = $_SESSION["language"];

        $sqlResponse = $this->dataBase->query("SELECT `currency_sign_{$currentLanguage}` FROM `currency` WHERE `currency` = '{$currency}'");
        $currencySign = $sqlResponse->fetch();
        return $currencySign["currency_sign_{$currentLanguage}"];
    }

    private function convertCurrency($amount, $from, $to)
    {
        $url = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
        $data = file_get_contents($url);
        preg_match("/<span class=bld>(.*)<\/span>/", $data, $converted);
        $converted = preg_replace("/[^0-9.]/", "", $converted[1]);

        return round($converted);
    }
}