<?php
/**
 * This file for Smarty 3 configuration.
 */

/**
 * Path to Smarty 3 library.
 *
 */
define('SMARTY_LIB_PATH', '../vendor/smarty/smarty/libs/Smarty.class.php');

/**
 * Choose Smarty 3 theme.
 * As a default enable 2 theme:
 * 1. simple;
 * 2. default;
 */
define('SMARTY_THEME', 'default');

/**
 * Path to Smarty 3 run file.
 */
define('SMARTY_RUN', '../app/Template/SmartyRun.php');

/**
 * Path to Template folder.
 *
 */
define('TEMPLATE_FOLDER', '../app/views/' . SMARTY_THEME);

/**
 * Path to compile templates folder.
 *
 */
define('TEMPLATE_COMPILED', '../app/Template/template_c/');

/**
 * Path to Template cache.
 *
 */
define('TEMPLATE_CACHE', '../app/Template/tmp/');

/**
 * Path to Smarty 3 configuration.
 */
define('TEMPLATE_CONFIG', '../app/Template/smartyDefines');