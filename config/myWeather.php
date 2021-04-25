<?php
	
	//Location APIs
	
	//Get Cities
	$myWeather['cityAPIURL']         = 'https://countries-cities.p.rapidapi.com/location/country/US/city/list?per_page=400000';
	
	// Get Countries
	$myWeather['countryAPIURL']      = 'https://countries-cities.p.rapidapi.com/location/country/list';
	$myWeather['locationAPIHeaders'] = [
	    'x-rapidapi-key'  => 'ce27e9d42fmsh113da6a556880bap1d4114jsn7529718549a4',
	    'x-rapidapi-host' => 'countries-cities.p.rapidapi.com',
	    'useQueryString'  => true
	];


	//Get Lat Long by City
	$myWeather['latLongByCityAPIURL'] = 'https://api.opencagedata.com/geocode/v1/json?'.
									'key=5d3e92b73ccc47cea5610888cd383c22'.
									'&q=';

	//Weather APIs
	//OpenWeather
	$myWeather['openWeatherMap'] 	  = 'http://api.openweathermap.org/data/2.5/weather?'.
									  'appid=44f0fb3096c5aa2152dbee8896c905bb'.
									  '&units=imperial'.
									  '&q=';

	//RapidAPI
	$myWeather['rapidAPI']			  = 'https://weatherbit-v1-mashape.p.rapidapi.com/current?'.
									  'units=imperial&';
	$myWeather['rapidAPIHeaders'] = [
	    'x-rapidapi-key'  => 'ce27e9d42fmsh113da6a556880bap1d4114jsn7529718549a4',
	    'x-rapidapi-host' => 'weatherbit-v1-mashape.p.rapidapi.com',
	    'useQueryString'  => true
	];

	return $myWeather;