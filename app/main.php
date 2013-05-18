<?php
/**
 * Load Venders
 */
require_once(__DIR__.'/vendor/flourish.php');
require_once(__DIR__.'/vendor/slim.php');
require_once(__DIR__.'/vendor/twig.php');
include_once(__DIR__.'/init.php');

/**
 * Load Models
 */
require_once(__DIR__.'/model/User.php');

/**
 * Load Controllers
 */
require_once(__DIR__.'/controller/Controller.php');
require_once(__DIR__.'/controller/UserController.php');
/**
 * Set Up Routes
 */
require_once(__DIR__.'/route.php');

