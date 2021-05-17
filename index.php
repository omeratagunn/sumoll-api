<?php
declare(strict_types=1);
define('APP_PATH', __DIR__);
ob_start();

include_once(APP_PATH.'/vendor/autoload.php');

use sumollapi\Bootstrap\Http;
use sumollapi\Middleware\Middleware;
use sumollapi\Router\RouteProvider;
use sumollapi\Bootstrap\Configuration;

$middleware = new Middleware(new RouteProvider(), new Http(), new Configuration());
$middleware->filterRequest();

ob_end_flush();




