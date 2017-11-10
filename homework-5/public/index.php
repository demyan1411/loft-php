<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/../bootstrap/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$routes = explode('/', $_SERVER['REQUEST_URI']);
$controller_name = "Main";
$action_name = 'index';
// получаем контроллер
if (!empty($routes[1])) {
    $controller_name = $routes[1];
}
// получаем действие
if (!empty($routes[2])) {
    $action_name = $routes[2];
}

$a=1;