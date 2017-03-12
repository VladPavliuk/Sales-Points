<?php

/**
 * Class Debug
 * class for render errors
 * and other debug
 *
 */
class Debug
{
    /**
     * If some went wrong this function should execute.
     *
     * @param $errorMessage
     */
    public static function showErrorPage($errorMessage)
    {
        $errorMessage = DEBUG_MODE ? $errorMessage : "Невідома помилка";
        exit($errorMessage);
    }
}