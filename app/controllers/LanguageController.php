<?php

class LanguageController
{
    public function setLanguageAction($language)
    {
        $_SESSION["language"] = $language;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}