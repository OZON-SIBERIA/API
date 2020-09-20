<?php


namespace App\Settings;


class ConfigExample
{
    private static $keyAPI = '11111111111111111111111';

    public static function getKeyAPI(): string
    {
        return self::$keyAPI;
    }
}