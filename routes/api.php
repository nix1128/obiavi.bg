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

// Route::get('/ads', function (Request $request) {
//     return Ads::all();
// });


// Route::get('ad/{id}', function( Request $request, $id){
//     return Ads::findOrFail($id);
// });

Route::apiResource('/ads', 'App\Http\Controllers\Api\AddsController')->only('index');
Route::apiResource('/ad', 'App\Http\Controllers\Api\AddsController')->only('show');

//  Route::apiResource('/ads', 'App\Http\Controllers\Api\AddsController',)->only(['index','show']);
