<?php 
namespace App\Helper;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;


class WeatherResultCacheHelper
{
    public static function Save($countryCode, $city, $fahrenheit) {
        if(self::EXISTS($countryCode, $city)) {
            return null;
        }

        Redis::HMSET('temperature:'.$countryCode.':'.$city,
            'countryCode', $countryCode, 
            'city', $city,
            'fahrenheit', $fahrenheit
        );
        
        return true;
    }

    public static function Getfahrenheit($countryCode, $city) {
        return Redis::HGET('temperature:'.$countryCode.':'.$city, 'fahrenheit');
    }

    public static function Exists($countryCode, $city) {
        return REDIS::EXISTS('temperature:'.$countryCode.':'.$city);
    }
}