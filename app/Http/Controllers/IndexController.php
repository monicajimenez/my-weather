<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

//Helpers
use App\Helper\APIHelper;
use Illuminate\Support\Arr;


class IndexController extends Controller
{
	private $countries;

	public function __construct()
	{
        $this->countries = APIHelper::getAPI('https://restcountries.eu/rest/v2/all?fields=name');
    }

	public function index(Request $request)
	{
		$countries = $this->countries;

	 	return View::make('index')->with(compact('countries'));
	}
}
