<?php

	$myWeather['cityAPIURL'] = 'https://countries-cities.p.rapidapi.com/location/country/US/city/list?page=2&per_page=20&population=1501';

	$myWeather['countryAPIURL'] = 'https://countries-cities.p.rapidapi.com/location/country/list';

	$myWeather['locationAPIHeaders'] = [
	    'x-rapidapi-key'  => 'ce27e9d42fmsh113da6a556880bap1d4114jsn7529718549a4',
	    'x-rapidapi-host' => 'countries-cities.p.rapidapi.com',
	    'useQueryString'  => true
	];

	return $myWeather;