<?php

class LanguageController extends Controller
{
    public function changeLanguageAction($language)
    {
        $_SESSION["language"] = $language;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}