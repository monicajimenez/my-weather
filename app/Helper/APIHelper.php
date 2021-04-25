<?php 
namespace App\Helper;

use GuzzleHttp\Client;

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

    public static function PostApi($url,$body) {
        $client = new Client();
        $response = $client->request("POST", $url, ['form_params'=>$body]);
        $response = $client->send($response);
        return json_decode($response, true);
    }
}