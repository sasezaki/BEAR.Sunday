<?php
namespace demoworld;

use BEAR\Framework\Dispatcher;

/**
 * Web script for prodcution use.
 *
 * @package BEAR.Framework
 *
 * @global string               $method   Resource method
 * @global BEAR\Resource\Client $resource Resource client
 * @global array                $query    Resource request query
 * @global BEAR\Resource\Object $page     Resource object (target)
 * @global BEAR\Resource\Object $response Resource object (response)
 */

// Init
include dirname(__DIR__) . '/scripts/exception_handler/prod_handler.php';

// Load
require dirname(__DIR__) . '/scripts/auto_loader.php';

// Route
$route = require dirname(__DIR__) . '/scripts/router/standard_router.php';
list($method, $pagePath, $query) = $route->match($GLOBALS);

// Request
$resource = require dirname(__DIR__). '/scripts/resource.php';
$response = $resource->$method->uri('page://self/' . $pagePath)->withQuery($query)->linkSelf('view')->eager->request();

// Output
include $appPath . '/scripts/output/prod.output.php';
