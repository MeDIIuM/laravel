<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ClientsController@index');
Route::get('/clients/station', 'StationController@index');
Route::resource('/clients', 'ClientsController');
Route::resource('/clients/{clientId}/cars', 'CarsController');

