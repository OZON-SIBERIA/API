придется<?php


require_once __DIR__.'/../vendor/autoload.php';


use App\Controllers\ServicesController;
use App\Services\OpenWeatherAPI;
use App\Services\TwigInitiator;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


$loader = new FilesystemLoader('../app/Template');
$twig = new Environment($loader);
TwigInitiator::twig_init($twig);

$routes = [
    "GET" => [
        '/weather' => [ServicesController::class, "getWeatherPageAction"]
    ],
    "POST" => [
        '/weather' => [ServicesController::class, "getWeatherAction"]
    ]
];

$request = Request::createFromGlobals();
$router = $routes[$request->getMethod()][$request->getPathInfo()];
$response = call_user_func($router, $request);

$response->send();


$cityName = 'Vladivostok';
$keyAPI = '11111';

$api = new OpenWeatherAPI($cityName, $keyAPI);
$result = $api->getCurrentWeatherByCity();
var_dump(json_decode($result, true));