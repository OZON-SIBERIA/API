<?php


require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\ServicesController;
use Symfony\Component\HttpFoundation\Request;


$routes = [
    "GET" => [
        '/' => [ServicesController::class, "getWeatherAction"]
    ],
    "POST" => [
        '/' => [ServicesController::class, "getWeatherAction"]
    ]
];

$request = Request::createFromGlobals();
$router = $routes[$request->getMethod()][$request->getPathInfo()];
$response = call_user_func($router, $request);

$response->send();
