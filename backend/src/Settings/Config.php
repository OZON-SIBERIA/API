<?php

namespace App\Settings;

use Symfony\Component\Dotenv\Dotenv;

class Config
{
    public static function getKeyAPI(): string
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/../../.env');
        $keyAPI = $_ENV['API_KEY'];

        return $keyAPI;
    }
}