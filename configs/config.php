<?php

/**
 * DIFFERENT CONFIGURATIONS.
 */

/**
 * Define email of admin.
 *
 */
define('EMAIL_ADMIN', "pavliuk.vlad@gmail.com");

/**
 * Show more info about errors.
 *
 */
define('DEBUG_MODE', true);

/**
 * Path to Router script file.
 *
 */
define('ROUTER_PATH', '../framework/Router/Router.php');

/**
 * Path to script witch contains all routes.
 *
 */
define('ROUTES_PATH', '../app/routes/main_routes.php');

//> CONTROLLERS CONFIGURATIONS
/**
 * Path to folder with controllers.
 *
 */
define('CONTROLLERS_PATH', '../app/controllers/');

/**
 * Set ending of controller file.
 *
 */
define('CONTROLLER_POSTFIX', 'Controller');

/**
 * Set ending on action method.
 *
 */
define('ACTION_POSTFIX', 'Action');
//<

//> DATA BASE, MODELS CONFIGURATIONS
/**
 * Path to folder with models.
 *
 */
define('MODELS_PATH','../app/models/');

/**
 * Path to script witch contains parameters for Data Base:
 * (host, data base, user, password).
 *
 */
define('DB_PARAMETERS_PATH', '../configs/dbconfig.php');

/**
 * Path to script, witch defines connection to Data Base.
 *
 */
define('DB_CONNECT_PATH', '../framework/DataBase/DataBase.php');
//<

//> TEMPLATE CONFIGURATIONS

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
define('SMARTY_RUN', '../framework/Template/SmartyRun.php');

/**
 * Path to Template folder.
 *
 */
define('TEMPLATE_FOLDER', '../app/views/' . SMARTY_THEME);

/**
 * Path to compile templates folder.
 *
 */
define('TEMPLATE_COMPILED', '../framework/Template/template_c/');

/**
 * Path to Template cache.
 *
 */
define('TEMPLATE_CACHE', '../framework/Template/tmp/');

/**
 * Path to Smarty 3 configuration.
 */
define('TEMPLATE_CONFIG', '../framework/Template/smartyDefines');
//<