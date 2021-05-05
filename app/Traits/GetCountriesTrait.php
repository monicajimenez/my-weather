<?php
 
namespace App\Traits; 

//Helpers
use App\Helper\APIHelper;

//Config
use Config;

trait GetCountriesTrait {
 
    public function getCountries() {
 		return APIHelper::getAPI(
        	Config::get('myWeather.countryAPIURL'), 
        	Config::get('myWeather.locationAPIHeaders')
        )['countries'];
    }
}