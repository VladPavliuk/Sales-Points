<?php

/**
 * THIS SCRIPT START APPLICATION.
 */

/**
 * Include file with configuration.
 *
 */
require_once('../configs/config.php');

/**
 * Include Router class.
 *
 */
require_once(ROUTER_PATH);

/**
 * Connecting to file which connect and start Template engine.
 *
 */
require_once(SMARTY_RUN);

/**
 * Start finding controller and action.
 * Based on URI. And execute them.
 *
 */
(new Router());


