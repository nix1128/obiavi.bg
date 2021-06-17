<?php

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




Route::apiResource('/ads', 'App\Http\Controllers\Api\AddsController')->only('index');
Route::apiResource('/ad', 'App\Http\Controllers\Api\AddsController')->only('show');
Route::get('/ad/{id}/availability', 'App\Http\Controllers\Api\AvailabilityController')
    ->name('availability.show');
Route::get('/ad/{id}/reviews', 'App\Http\Controllers\Api\ReviewsController')
    ->name('reviews.show');

    Route::get('ad/{id}/price','App\Http\Controllers\Api\PriceSetController')->name('price.set.show');

Route::apiResource('review', "App\Http\Controllers\Api\ReviewPageController")->only('show','store');

Route::get('ad-details-id/{reveiewKey}', "App\Http\Controllers\Api\ReviewKeyCheckController")->name('ad-details.show');
