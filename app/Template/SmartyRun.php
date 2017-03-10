<?php

/**
 * Include Smarty 3 library.
 *
 */
require_once(SMARTY_LIB_PATH);

class SmartyRun
{
    /**
     * Return smarty object
     *
     * @return Smarty
     */
    public static function connect()
    {

        $smarty = new Smarty();

        $smarty->template_dir = TEMPLATE_FOLDER;
        $smarty->compile_dir = TEMPLATE_COMPILED;
        $smarty->cache_dir = TEMPLATE_CACHE;
        $smarty->config_dir = TEMPLATE_CONFIG;
        $smarty->caching = Smarty::CACHING_OFF;

        return $smarty;
    }
}