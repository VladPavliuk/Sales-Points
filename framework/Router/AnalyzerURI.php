<?php

/**
 * Trait AnalyzerURI
 * return array of inner path elements name
 *
 */
trait AnalyzerURI
{
    // Path to routes array
    private $routesPath = ROUTES_PATH;

    //> List of request variables
    private $routesArray = [];
    private $requestURI = "/";
    private $requestHttpMethod = "GET";
    //<

    //> List of error messages
    private $routesArrayError = "Масиву із роутерами не було знайдено";
    private $routeError = "Роут не знайдено";

    //<

    /**
     * main Traits method
     *
     * @return array of inner path elements name
     */
    public function getInnerPathArray()
    {
        //> Define parameters for Analyzer
        $this->getRoutesArray();
        $this->getURI();
        $this->getHttpMethod();
        //<

        // Get array of initial path
        $singleRoute = $this->getSingleRoute();

        return $singleRoute;
    }

    /**
     * Define single route
     *
     * @return array
     */
    private function getSingleRoute()
    {
        $routesArray = $this->routesArray;
        $requestHttpMethod = $this->requestHttpMethod;
        $requestUri = $requestHttpMethod . ":" . $this->requestURI;

        foreach ($routesArray as $routeURI => $routePath) {
            if (preg_match("~^$routeURI$~", $requestUri)) {

                $initialPath = preg_replace("~$routeURI~", $routePath, $requestUri);
                return explode(":", $initialPath);
            }
        }
        // Route did not find
        self::showErrorPage($this->routeError);
    }

    /**
     * Get string of request URI.
     *
     * @return string
     */
    private function getURI()
    {
        $requestUri = $_SERVER['REQUEST_URI'];

        if (isset($requestUri)) {
            $this->requestURI = trim($requestUri, '/');
        }
    }

    /**
     * Get Http request method
     *
     * @return string
     */
    private function getHttpMethod()
    {
        $this->requestHttpMethod = $_SERVER["REQUEST_METHOD"];
    }

    /**
     * Get array of routes.
     *
     * @return array
     */
    private function getRoutesArray()
    {
        $routesPath = $this->routesPath;

        if (file_exists($routesPath)) {
            $this->routesArray = include($routesPath);
        } else {
            // Some went wrong!
            self::showErrorPage($this->routesArrayError);
        }
    }
}