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

    /**
     * View array in readable form.
     *
     * @param $arrayToView
     * @param $stopAfterArrayRender
     */
    public static function viewArray($arrayToView, $stopAfterArrayRender = false)
    {
        echo '<pre>';
        print_r($arrayToView);
        echo '</pre>';

        if($stopAfterArrayRender) {
            exit();
        }
    }
}