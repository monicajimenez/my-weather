<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

//Helpers
use App\Helper\APIHelper;
use Illuminate\Support\Arr;

//config
use Config;


class IndexController extends Controller
{
	private $countries;

	public function __construct()
	{
        $this->countries = APIHelper::getAPI(
        	Config::get('myWeather.countryAPIURL'), 
        	Config::get('myWeather.locationAPIHeaders')
        );
    }

	public function index(Request $request)
	{
		$countries = $this->countries['countries'];

	 	return View::make('index')->with(compact('countries'));
	}
}
