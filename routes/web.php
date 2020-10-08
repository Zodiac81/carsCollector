<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])
    ->name('dashboard');

Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers\Admin'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['uses' => 'ProfileController@edit', 'as' => 'profile.edit']);
	Route::put('profile', ['uses' => 'ProfileController@update', 'as' => 'profile.update']);
	Route::put('profile/password', ['uses' => 'ProfileController@password','as' => 'profile.password']);
    Route::get('{page}', ['uses' => 'PageController@index', 'as' => 'page.index']);
});


