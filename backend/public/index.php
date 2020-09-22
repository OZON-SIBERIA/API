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
    ],
    "OPTIONS" => [
        '/' => [ServicesController::class, "optionsHandler"]
    ]
];

$request = Request::createFromGlobals();
$router = $routes[$request->getMethod()][$request->getPathInfo()];
$response = call_user_func($router, $request);
$response->headers->set('Access-Control-Allow-Origin', '*');

$response->send();
