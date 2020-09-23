<?php


namespace App\Services;


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
        $queryToAPI = curl_init();
        $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$this->cityName.'&appid='.$this->keyAPI.'&lang=ru';
        curl_setopt($queryToAPI, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($queryToAPI, CURLOPT_URL, $url);
        $resultOfQuery = curl_exec($queryToAPI);
        curl_close($queryToAPI);
        $resultOfQuery = json_decode($resultOfQuery, true);

        if(
            ($resultOfQuery["wind"]["deg"]>= 0 and $resultOfQuery["wind"]["deg"] <= 22.5) or
            ($resultOfQuery["wind"]["deg"]>= 337.5 and $resultOfQuery["wind"]["deg"] <= 360)
        )
        {
            $wind_direction = 'Север';
        }
        elseif (($resultOfQuery["wind"]["deg"]>= 22.5 and $resultOfQuery["wind"]["deg"] <= 67.5))
        {
            $wind_direction = 'Северо-Восток';
        }
        elseif (($resultOfQuery["wind"]["deg"]>= 67.5 and $resultOfQuery["wind"]["deg"] <= 112.5))
        {
            $wind_direction = 'Восток';
        }
        elseif (($resultOfQuery["wind"]["deg"]>= 112.5 and $resultOfQuery["wind"]["deg"] <= 157.5))
        {
            $wind_direction = 'Юго-Восток';
        }
        elseif (($resultOfQuery["wind"]["deg"]>= 157.5 and $resultOfQuery["wind"]["deg"] <= 202.5))
        {
            $wind_direction = 'Юг';
        }
        elseif (($resultOfQuery["wind"]["deg"]>= 202.5 and $resultOfQuery["wind"]["deg"] <= 247.5))
        {
            $wind_direction = 'Юго-Запад';
        }
        elseif (($resultOfQuery["wind"]["deg"]>= 247.5 and $resultOfQuery["wind"]["deg"] <= 292.5))
        {
            $wind_direction = 'Запад';
        }
        elseif (($resultOfQuery["wind"]["deg"]>= 292.5 and $resultOfQuery["wind"]["deg"] <= 337.5))
        {
            $wind_direction = 'Северо-Запад';
        }
        else
        {
            $wind_direction = 'Неизвестно';
        }

        $weatherInfo = (array("city" => $resultOfQuery["name"],
            "country" => $resultOfQuery["sys"]["country"],
            "datetime" => $resultOfQuery["dt"],
            "temperature" => round(($resultOfQuery["main"]["temp"]-273.15)),
            "feels_like" => round(($resultOfQuery["main"]["feels_like"]-273.15)),
            "weather" => $resultOfQuery["weather"]["0"]["description"],
            "humidity" => $resultOfQuery["main"]["humidity"],
            "wind_speed" => $resultOfQuery["wind"]["speed"],
            "wind_direction" => $wind_direction,
            "cloudiness" => $resultOfQuery["clouds"]["all"]
        ));

        return $weatherInfo;
    }
}