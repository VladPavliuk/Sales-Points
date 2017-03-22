<?php

class CurrencyController extends Controller
{
    public function changeCurrencyAction($currency)
    {
        $_SESSION["currency"] = $currency;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}