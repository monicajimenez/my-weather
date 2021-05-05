<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

//Helpers
use App\Helper\APIHelper;
use Illuminate\Support\Arr;

//Traits
use App\Traits\GetCountriesTrait;


class IndexController extends Controller
{
	use GetCountriesTrait;

	private $countries;

	public function __construct()
	{
        $this->countries = $this->getCountries();
    }

	public function index(Request $request)
	{
	 	return View::make('index')->with(['countries' => $this->countries]);
	}
}
