<?php

require_once("AnalyzerURI.php");
require_once("AnalyzerInnerPath.php");
require_once("AnalyzerModelsConnect.php");

/**
 * Class Router execute running controller and action.
 * Based on request URI.
 *
 */
class Router
{
    use AnalyzerURI, AnalyzerInnerPath, AnalyzerModelsConnect;

    /**
     * If some went wrong this function will execute.
     *
     * @param $errorMessage
     */
    public static function showErrorPage($errorMessage)
    {
        $errorMessage = DEBUG_MODE ? $errorMessage : "Невідома помилка";
        exit($errorMessage);
    }

    /**
     * Start router
     *
     * Router constructor.
     *
     */
    public function __construct()
    {
        // Start trait - AnalyzerURI
        $singleRoute = $this->getInnerPathArray();

        $innerPathArray = array_shift($singleRoute);

        // Start trait - AnalyzerModelsConnect
        $this->defineModels();

        // Start trait - AnalyzerControllerConnect
        $this->defineInnerPath($innerPathArray);

        // Start if all OK
        $this->runActionMethod();
    }

    /**
     * Run action method if all OK
     *
     */
    private function runActionMethod()
    {
        $controllerObj = $this->controllerObj;
        $actionMethod = $this->actionMethod;
        $actionParameters = $this->actionParameters;

        call_user_func_array([$controllerObj, $actionMethod], $actionParameters);
    }
}