<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

//Helpers
use App\Helper\APIHelper;
use App\Helper\WeatherResultCacheHelper;

//Traits
use App\Traits\GetCountriesTrait;

//Config
use Config;

class WeatherController extends Controller
{
    use GetCountriesTrait;

    public function getFahrenheit(Request $request) {
        $queryString      = $request->all();
        $city             = $queryString['city'];
        $codeAndCountry[] = explode('.', $queryString['codeAndCountry']);
        $countryCode      = $codeAndCountry[0][0];
        $country          = $codeAndCountry[0][1];

        //Check if Valid City
        if (!$this->CheckIfValidCity($countryCode, $city)) {
            return View::make('index', 
                    [
                        'error' => 'Invalid City. Please try again.',
                        'countries' => $this->getCountries()
                    ]
                );
        }
        
        //Get fahrenheit
        $fahrenheit = $this->getFahrenheitThroughCache($countryCode, $city);
    	
        if ($fahrenheit) {
            return View::make('result', compact('fahrenheit'));
        }

        $fahrenheit = $this->getFahrenheitThroughAPI($city);

        //Save fahrenheit to Cache
        $this->saveFahrenheitInCache($countryCode, $city, $fahrenheit);

        //Return
    	return View::make('result', compact('fahrenheit'));
    }

    private function CheckIfValidCity($countryCode, $city) {
        $ValidCities = APIHelper::PostApi(
                Config::get('myWeather.cityAPIURL'),
                ['country' => 'Philippines']
            );

        if (!$ValidCities) {
            return false;
        }

        if (!in_array($city, $ValidCities->data)) {
            return false;
        }

        return true;
    }

    private function getFahrenheitThroughCache($countryCode, $city) {
        if (!WeatherResultCacheHelper::Exists($countryCode, $city)) {
            return null;
        }

        return WeatherResultCacheHelper::Getfahrenheit($countryCode, $city);
    }

    private function saveFahrenheitInCache($countryCode, $city, $fahrenheit) {
        return WeatherResultCacheHelper::Save($countryCode, $city, $fahrenheit);
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
