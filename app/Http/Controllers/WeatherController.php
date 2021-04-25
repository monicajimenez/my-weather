<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

//Helpers
use App\Helper\APIHelper;

//Config
use Config;

class WeatherController extends Controller
{
    public function check(Request $request)
    {
        $queryString = $request->all();
       	$temperature = $this->getTemperature($queryString['city']);
    	
    	return View::make('result', compact('temperature'));
    }

    private function getTemperature($city)
    {
    	$temperatureOne = $this->getTemperatureThroughOpenWeatherMap($city);
    	$temperatureTwo = $this->getTemperatureThroughRapidAPI($city);

    	return ($temperatureOne+$temperatureTwo)/2;
    }

    private function getTemperatureThroughRapidAPI($city)
    {
    	$latitudeLongitude = $this->getLatitudeLongitudeByCity($city);
    	$longitude 	       = $latitudeLongitude['lng'];
    	$latitude 		   = $latitudeLongitude['lat'];

    	return APIHelper::getAPI(
	    		Config::get('myWeather.rapidAPI').'lon='.$longitude.'&lat='.$latitude,
	    		Config::get('myWeather.rapidAPIHeaders')
    		)['data'][0]['temp'];
    }

    private function getTemperatureThroughOpenWeatherMap($city)
    {
    	return APIHelper::getAPI(
	    		Config::get('myWeather.openWeatherMap').$city
	    	)['main']['temp'];
    }

    private function getLatitudeLongitudeByCity($city)
    {
    	return APIHelper::getAPI(
    			Config::get('myWeather.latLongByCityAPIURL').$city
    		)['results'][0]['geometry'];
    }
}
