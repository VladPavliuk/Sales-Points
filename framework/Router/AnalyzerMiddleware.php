<?php

/**
 * Trait AnalyzerMiddleware
 *
 * Require array of middleware
 * Define: controller, action, parameters
 *
 */
trait AnalyzerMiddleware
{
    // Path to folder with middlewares.
    private $middlewaresFolderPath = MIDDLEWARES_PATH;

    public function defineMiddlewares($middlewarsList)
    {
        if ($middlewarsList) {
            $middlewarsList = explode(',', $middlewarsList);

            $this->getMiddlewares($middlewarsList);
        }
    }

    private function getMiddlewares($middlewarsList)
    {
        foreach ($middlewarsList as $middleware) {
            $middleware = $middleware . 'Middleware';

            $middlewareFile = $middleware . '.php';

            include $this->middlewaresFolderPath . $middlewareFile;

            (new $middleware());
        }
    }
}