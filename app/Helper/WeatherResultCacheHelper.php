<?php 
namespace App\Helper;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;


class WeatherResultCacheHelper
{
    public static function Save($country, $city, $fahrenheight)
    {
        if(self::EXISTS($country, $city)) {
            return null;
        }

        Redis::HMSET('temperature:'.$country.':'.$city,
            'country', $country, 
            'city', $city,
            'fahrenheight', $fahrenheight
        );
        
        return json_decode($request->getBody(), true);
    }

    public static function GetFahrenheight($country, $city) {
        return Redis::HGET('temperature:'.$country.':'.$city, 'fahrenheight');
    }

    public static function Exists($country, $city) {
        return REDIS::EXISTS('temperature:'.$country.':'.$city);
    }
}