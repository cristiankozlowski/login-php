<?php 
session_start();

require __DIR__ . "/vendor/autoload.php";


use CoffeeCode\Router\Router;


$router = new Router(ROOT);

$router->namespace("Source\Controllers");

/** Web Routes */
$router->group(null);
$router->get("/", "Web:login", "web.login");
$router->get("/cadastrar", "Web:register", "web.register");

/** Auth Routes */
$router->group(null);
$router->post("/login", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");

/** App Access */
$router->group('/me');
$router->get('/', 'App:home', "app.home");
$router->get('/logoff', 'App:logoff', "app.logoff");

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error", "web.error");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if($router->error()) {
  $router->redirect("/ooops/{$router->error()}");
}