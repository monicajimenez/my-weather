<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\IndexController;

//Test
use Illuminate\Support\Facades\Redis;
use App\Helper\WeatherResultCacheHelper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Controllers
Route::get('/', [IndexController::class, 'index']);
Route::post('getFahrenheit', [WeatherController::class, 'getFahrenheit']);