<?php


namespace App\Services;


class OpenWeatherAPI {

    protected $cityName;
    protected $keyAPI;

    public function __construct($cityName, $keyAPI) {
        $this->cityName = $cityName;
        $this->keyAPI = $keyAPI;
    }

    public function getCurrentWeatherByCity() {
        $queryToAPI = curl_init();
        $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$this->cityName.'&appid='.$this->keyAPI;
        curl_setopt($queryToAPI, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($queryToAPI, CURLOPT_URL, $url);
        $result=curl_exec($queryToAPI);
        curl_close($queryToAPI);
        return $result;
    }
}