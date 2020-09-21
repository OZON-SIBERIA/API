<?php


namespace App\Controllers;

use App\Settings\Config;
use App\Services\OpenWeatherAPI;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ServicesController
{
    public static function getWeatherAction (Request $request): Response
    {
        $cityName = json_decode($request->getContent(), true);
        $keyAPI = Config::getKeyAPI();
        $api = new OpenWeatherAPI($cityName, $keyAPI);
        $result = $api->getCurrentWeatherByCity();
        //var_dump($result);

        return JsonResponse::create($result);
    }

    public static function optionsHandler (Request $request): Response
    {
        return Response::create();
    }
}