<?php

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/jobs', 'JobController@index');
Route::post('/jobs', 'JobController@store');
Route::put('/jobs/{job}', 'JobController@edit');
Route::patch('/jobs/{job}', 'JobController@edit');
Route::get('/jobs/create', 'JobController@create');
Route::delete('/jobs/{job}', 'JobController@destroy');


Route::namespace('Services')->prefix('auth')->middleware('auth')->group(function ()
{

    Route::namespace('Google')->prefix('google')->group(function() {

        Route::get('go-to', 'AuthController@toGoogle');
        Route::get('from', 'AuthController@fromGoogle');
        Route::get('sheets', 'SheetController@index');

    });

});



