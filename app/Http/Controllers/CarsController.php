<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Clients;
use http\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function index($clientId)
    {
        $carsModel= new Cars();
        $cars = $carsModel->getCars($clientId);
        $client = $carsModel->getClientForCar($clientId);
        return view('cars_index', [
            'cars' => $cars,
            'client' => $client,
        ]);
    }

    public function create($clientId)
    {
        return view('cars_add', [
            'clientId' => $clientId,
        ]);
    }

    public function store($clientId, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required|max:255',
            'colour' => 'required|max:255',
            'model' => 'required|max:255',
            'number' => 'required|max:255',
            'station' => "in:on,off"
        ]);
        if ($validator->fails()) {
            return redirect('/clients/' . $clientId . "/cars/create")
                ->withInput()
                ->withErrors($validator);
        }
        $brand = $request->input('brand');
        $colour = $request->input('colour');
        $model = $request->input('model');
        $number = $request->input('number');
        $station = $request->input('station');
        $carsModel= new Cars();
        $carsModel->addCar($clientId,$brand,$colour,$model,$number,$station);
        return redirect('/clients/' . $clientId . "/cars");
    }

    public function destroy($clientId, $car)
    {
        $carsModel= new Cars();
        $carsModel->deleteCar($car);
        return redirect('/clients/' . $clientId . '/cars');
    }


    public function edit($clientId, $id)
    {
        $carsModel= new Cars();
        $car = $carsModel->getClientById($id);
        return view('cars_update', [
            'clientId' => $clientId,
            'car' => $car,
        ]);
    }

    public function update($clientId, $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required|max:255',
            'colour' => 'required|max:255',
            'model' => 'required|max:255',
            'number' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return redirect('/clients/' . $clientId . "/cars")
                ->withInput()
                ->withErrors($validator);
        }
        $brand = $request->input('brand');
        $colour = $request->input('colour');
        $model = $request->input('model');
        $number = $request->input('number');
        $station = $request->input('station');
        $carsModel= new Cars();
        $carsModel->addCar($id,$brand,$colour,$model,$number,$station);
        return redirect('/clients/' . $clientId . "/cars");
    }

}