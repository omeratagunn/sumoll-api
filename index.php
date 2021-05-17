<?php
declare(strict_types=1);
ob_start();

include_once(__DIR__.'/vendor/autoload.php');
use sumollapi\Bootstrap\Http;
use sumollapi\Config\Config;
use sumollapi\Middleware\Middleware;
use sumollapi\Router\RouteProvider;

$middleware = new Middleware(new RouteProvider(), new Http(), new Config());
$middleware->filterRequest();

ob_end_flush();
