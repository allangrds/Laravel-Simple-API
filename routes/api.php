<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('tasks')->group(function () {
    Route::get('/', 'TaskController@index')->name('tasks.index');
    Route::post('/', 'TaskController@store')->name('tasks.store');
    Route::get('/{task}', 'TaskController@show')->name('tasks.show');
    Route::patch('/{task}', 'TaskController@update')->name('tasks.update');
    Route::delete('/{task}', 'TaskController@destroy')->name('tasks.destroy');
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login')->name('auth.login');

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', 'AuthController@logout')->name('auth.logout');
    });
});

