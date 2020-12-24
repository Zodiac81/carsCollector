<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::group(['middleware' => ['web']], function() {
//
//});

Route::group([], function(){
    Route::apiResources([
        'series' => SeriesController::class,
        'categories' => CategoryController::class,
    ]);
});

