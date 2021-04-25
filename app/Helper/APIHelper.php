<?php 
namespace App\Helper;

use GuzzleHttp\Client;

class APIHelper
{

    public static function GetApi($url)
    {
        $client = new Client();
        $request = $client->get($url);
        $response = $request->getBody();
        return $response;
    }


    public static function PostApi($url,$body) {
        $client = new Client();
        $response = $client->request("POST", $url, ['form_params'=>$body]);
        $response = $client->send($response);
        return $response;
    }
}