<?php

/**
 * DIFFERENT CONFIGURATIONS.
 */

// Show more info
define('DEVELOPER_MODE', true);

// Path to script witch contains parameters for Data Base:
// (host, data base, user, password).
define('DB_PARAMETERS_PATH', '../config/dbconfig.php');

// Path to script, witch defines connection to Data Base.
define('DB_CONNECT_PATH', '../app/models/DataBase/DataBase.php');

// Path to folder with controllers.
define('CONTROLLERS_PATH', '../app/controllers/');

// Path to folder with models.
define('MODELS_PATH','../app/models/');

// Set ending of controller file.
define('CONTROLLER_POSTFIX', 'Controller');

// Set ending on action method.
define('ACTION_POSTFIX', 'Action');

// Path to Router script file
define('ROUTER_PATH', '../app/Router/Router.php');

// Path to script witch contains all routes.
define('ROUTES_PATH', '../app/routes/main_routes.php');

/**
 * Include Smarty configuration.
 *
 */
require_once('smarty_config.php');

// Define email of admin
define('EMAIL_ADMIN', "pavliuk.vlad@gmail.com");