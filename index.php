<?php

declare(strict_types=1);



ob_start();
error_reporting(1);
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<b>ERROR:</b> [$errno] $errstr. Error on line $errline in $errfile<br>";

    $fh = fopen(__DIR__."/storage/logs/error.txt", "a");
    $fs = date('Y-m-d H:i:s', time())." ERROR: [$errno] $errstr Error on line $errline in $errfile\n";
    fwrite($fh, $fs);
    fclose($fh);

    return true;
}

set_error_handler("myErrorHandler");
date_default_timezone_set('America/Los_Angeles');


ini_set('session.gc_maxlifetime','950400');
session_set_cookie_params(950400);

ini_set('session.cookie_secure','1');
ini_set('session.cookie_httponly','1');
ini_set('session.use_only_cookies','1');

session_start();

// load composer //
include_once(__DIR__.'/vendor/autoload.php');
use sumollapi\Bootstrap\Http;
use sumollapi\Config\Config;
use sumollapi\Middleware\Middleware;
use sumollapi\Router\RouteProvider;


//Middleware

$middleware = new Middleware(new RouteProvider(), new Http(), new Config());
$middleware->forwardRequest();

ob_end_flush();
