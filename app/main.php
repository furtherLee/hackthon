<?php
/**
 * Load Venders
 */
require_once(__DIR__.'/vendors/flourish.php');
require_once(__DIR__.'/vendors/slim.php');
require_once(__DIR__.'/vendors/twig.php');
include_once(__DIR__.'/init.php');

/**
 * Load Models
 */


/**
 * Load Controllers
 */
require_once(__DIR__.'/controllers/Controller.php');

/**
 * Set Up Routes
 */
require_once(__DIR__.'/routes.php');

