<?php

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/jobs', 'JobController@index');
Route::post('/jobs', 'JobController@store');
Route::put('/jobs/{job}', 'JobController@edit');
Route::patch('/jobs/{job}', 'JobController@edit');
Route::get('/jobs/create', 'JobController@create');
Route::delete('/jobs/{job}', 'JobController@destroy');

Route::get('/test', function() {
    return ['hello' => 'world', 'zak' => 'horton', 'blake' => 'higgins'];
});
