<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WeatherController extends Controller
{
    public function check(Request $request)
    {
        $queryString = $request->all();
    }
}
