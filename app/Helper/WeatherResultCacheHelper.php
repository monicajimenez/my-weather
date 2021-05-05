<?php 
namespace App\Helper;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;


class WeatherResultCacheHelper
{
    public static function Save($countryCode, $city, $Fahrenheit) {
        if(self::EXISTS($countryCode, $city)) {
            return null;
        }

        Redis::HMSET('temperature:'.$countryCode.':'.$city,
            'countryCode', $countryCode, 
            'city', $city,
            'Fahrenheit', $Fahrenheit
        );
        
        return true;
    }

    public static function GetFahrenheit($countryCode, $city) {
        return Redis::HGET('temperature:'.$countryCode.':'.$city, 'Fahrenheit');
    }

    public static function Exists($countryCode, $city) {
        return REDIS::EXISTS('temperature:'.$countryCode.':'.$city);
    }
}