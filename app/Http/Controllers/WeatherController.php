<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

//Helpers
use App\Helper\APIHelper;
use App\Helper\WeatherResultCacheHelper;

//Config
use Config;

class WeatherController extends Controller
{
    public function check(Request $request) {
        $queryString = $request->all();
        $city        = $queryString['city'];
        $countryCode = $queryString['countryCode'];       	

        //Get Fahrenheit
        $Fahrenheit = $this->getFahrenheitThroughCache($countryCode, $city);
    	
        if ($Fahrenheit) {
            return View::make('result', compact('Fahrenheit'));
        }

        $Fahrenheit = $this->getFahrenheitThroughAPI($city);

        //Save Fahrenheit to Cache
        $this->saveFahrenheitInCache($countryCode, $city, $Fahrenheit);

        //Return
    	return View::make('result', compact('Fahrenheit'));
    }

    private function getFahrenheitThroughCache($countryCode, $city) {
        if (!WeatherResultCacheHelper::Exists($countryCode, $city)) {
            return null;
        }

        return WeatherResultCacheHelper::GetFahrenheit($countryCode, $city);
    }

    private function saveFahrenheitInCache($countryCode, $city, $Fahrenheit) {
        return WeatherResultCacheHelper::Save($countryCode, $city, $Fahrenheit);
    }

    private function getFahrenheitThroughAPI($city) {
    	$temperatureOne = $this->getFahrenheitThroughOpenWeatherMap($city);
    	$temperatureTwo = $this->getFahrenheitThroughRapidAPI($city);

        return ($temperatureOne+$temperatureTwo)/2;
    }

    private function getFahrenheitThroughRapidAPI($city) {
    	$latitudeLongitude = $this->getLatitudeLongitudeByCity($city);
    	$longitude 	       = $latitudeLongitude['lng'];
    	$latitude 		   = $latitudeLongitude['lat'];

    	return APIHelper::getAPI(
	    		Config::get('myWeather.rapidAPI').'lon='.$longitude.'&lat='.$latitude,
	    		Config::get('myWeather.rapidAPIHeaders')
    		)['data'][0]['temp'];
    }

    private function getFahrenheitThroughOpenWeatherMap($city) {
    	return APIHelper::getAPI(
	    		Config::get('myWeather.openWeatherMap').$city
	    	)['main']['temp'];
    }

    private function getLatitudeLongitudeByCity($city) {
    	return APIHelper::getAPI(
    			Config::get('myWeather.latLongByCityAPIURL').$city
    		)['results'][0]['geometry'];
    }
}
