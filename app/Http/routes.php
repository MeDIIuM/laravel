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

use Illuminate\Http\Request;


Route::get('/', 'ClientsController@index');
Route::get('/clients/station', 'StationController@index');
Route::resource('/clients', 'ClientsController');
Route::resource('/clients/{clientId}/cars', 'CarsController');


//Route::get('/clients/{client}/cars', 'CarsController@index');
//Route::get('/clients/{client}/cars/create', 'ClientsController@create');
//Route::post('/clients/{client}/cars', 'ClientsController@store');

//Route::get('/add/{add}', 'ClientsController@del');
//Route::get('/', 'CarsController@show');
//Route::get('/car', 'CarsController@add');
//Route::get('/car/{car}', 'CarsController@del');

/*
Route::get('/', function () {
    $clients = App\Clients::orderBy('created_at', 'asc')->get();
    return view('clients', [
        'clients' => $clients
    ]);
});
Route::post('/client', function (Request $request) {
    $validator = Validator::make($request->all(), ['name' => 'required|max:255']);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $client = new App\Clients;
    $client->name = $request->name;
    $client->gender = $request->gender;
    $client->phone = $request->phone;
    $client->address = $request->address;
    $client->cars = $request->cars;
    $client->save();
    return redirect('/');
});
Route::delete('/client/{client}', function ($client) {
    App\Clients::destroy($client);
    return redirect('/');
});
*/