<?php

require_once("scripts/routes/routes.php");
require_once("scripts/routes/app_routes.php");
require __DIR__ . '/vendor/autoload.php';

$routes = new Routes();

buildRoutes($routes);

$routes->route();