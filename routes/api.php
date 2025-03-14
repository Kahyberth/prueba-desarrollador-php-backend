<?php

use App\Http\Controllers\cityController;
use App\Http\Controllers\countryController;
use App\Http\Controllers\currencyController;
use App\Http\Controllers\searchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/country', [countryController::class, 'createCountry']);
Route::get('/country', [countryController::class, 'getAllCountries']);

Route::post('/city', [cityController::class, 'createCity']);
Route::get('/city', [cityController::class, 'getAllCities']);
Route::get('/city/{id}', [cityController::class, 'getCityById']);
Route::get('/city/{id}/country', [cityController::class, 'getCitiesByCountry']);

Route::post('/currency', [currencyController::class, 'createCurrency']);

Route::post('/createSearch', [searchController::class, 'createSearch']);
