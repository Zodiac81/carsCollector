<?php

use App\Http\Controllers\Api\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::group(['middleware' => ['web']], function() {
//
//});

Route::resource('series', SeriesController::class);
