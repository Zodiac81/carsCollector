<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Client
Route::get('/', [App\Http\Controllers\Client\HomeController::class, 'index']);




//Admin panel


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])
    ->name('dashboard');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['uses' => 'ProfileController@edit', 'as' => 'profile.edit']);
	Route::put('profile', ['uses' => 'ProfileController@update', 'as' => 'profile.update']);
	Route::put('profile/password', ['uses' => 'ProfileController@password','as' => 'profile.password']);
    Route::get('{page}', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('page.index');
//    Route::get('{page}', ['uses' => 'PageController@index', 'as' => 'page.index']);


});



