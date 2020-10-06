<?php


namespace App\Services;


use GuzzleHttp\Client;

class OpenWeatherAPI
{
    protected $cityName;
    protected $keyAPI;

    public function __construct($cityName, $keyAPI)
    {
        $this->cityName = $cityName;
        $this->keyAPI = $keyAPI;
    }

    public function getCurrentWeatherByCity()
    {
        $client = new Client([
            'base_uri' => 'http://api.openweathermap.org/'
        ]);
        $response = $client->request(
            'GET',
            '/data/2.5/weather?q=' . $this->cityName . '&appid=' . $this->keyAPI . '&lang=ru'
        );
        if ($response->getStatusCode() == 200) {
            $resultOfQuery = json_decode($response->getBody(), true);

            if (
                ($resultOfQuery["wind"]["deg"] >= 0 and $resultOfQuery["wind"]["deg"] <= 22.5) or
                ($resultOfQuery["wind"]["deg"] >= 337.5 and $resultOfQuery["wind"]["deg"] <= 360)
            ) {
                $wind_direction = 'Северного';
            } elseif (($resultOfQuery["wind"]["deg"] >= 22.5 and $resultOfQuery["wind"]["deg"] <= 67.5)) {
                $wind_direction = 'Северо-Восточного';
            } elseif (($resultOfQuery["wind"]["deg"] >= 67.5 and $resultOfQuery["wind"]["deg"] <= 112.5)) {
                $wind_direction = 'Восточного';
            } elseif (($resultOfQuery["wind"]["deg"] >= 112.5 and $resultOfQuery["wind"]["deg"] <= 157.5)) {
                $wind_direction = 'Юго-Восточного';
            } elseif (($resultOfQuery["wind"]["deg"] >= 157.5 and $resultOfQuery["wind"]["deg"] <= 202.5)) {
                $wind_direction = 'Южного';
            } elseif (($resultOfQuery["wind"]["deg"] >= 202.5 and $resultOfQuery["wind"]["deg"] <= 247.5)) {
                $wind_direction = 'Юго-Западного';
            } elseif (($resultOfQuery["wind"]["deg"] >= 247.5 and $resultOfQuery["wind"]["deg"] <= 292.5)) {
                $wind_direction = 'Западного';
            } elseif (($resultOfQuery["wind"]["deg"] >= 292.5 and $resultOfQuery["wind"]["deg"] <= 337.5)) {
                $wind_direction = 'Северо-Западного';
            } else {
                $wind_direction = 'Неизвестно';
            }

            $weatherInfo = (array("city" => $resultOfQuery["name"],
                "country" => $resultOfQuery["sys"]["country"],
                "datetime" => $resultOfQuery["dt"],
                "temperature" => round(($resultOfQuery["main"]["temp"] - 273.15)),
                "feels_like" => round(($resultOfQuery["main"]["feels_like"] - 273.15)),
                "weather" => $resultOfQuery["weather"]["0"]["description"],
                "humidity" => $resultOfQuery["main"]["humidity"],
                "wind_speed" => $resultOfQuery["wind"]["speed"],
                "wind_direction" => $wind_direction,
                "cloudiness" => $resultOfQuery["clouds"]["all"]
            ));
        }
        return $weatherInfo;
    }
}