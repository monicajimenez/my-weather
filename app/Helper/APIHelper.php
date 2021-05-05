<?php 
namespace App\Helper;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class APIHelper
{

    public static function GetApi($url, $headers = [])
    {
        $client = new Client();

        if($headers) {
           $request = $client->get($url, [
                'headers' => [
                    'x-rapidapi-key'  => $headers['x-rapidapi-key'],
                    'x-rapidapi-host' => $headers['x-rapidapi-host'],
                    'useQueryString'  => $headers['useQueryString']
                ]
            ]);
        }
        else { 
            $request = $client->get($url);
        }
        
        return json_decode($request->getBody(), true);
    }

    public static function PostApi($url,$body = []) {
        return json_decode(Http::post($url, $body));
    }
}