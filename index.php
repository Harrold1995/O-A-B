<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

ini_set('session.cookie_httponly', 1);
ob_start();
require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$router = new Router(url() ,":");
$router->namespace("Source\Router");

$router->group(null);
$router->get("/","Web:home");
$router->get("/resources","Web:home");
$router->get("/{token}","Web:resources");


/**
 * ERROR ROUTES
 */
$router->group("/oops");
$router->get("/{errcode}", "Web:error");


/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}

ob_end_flush();