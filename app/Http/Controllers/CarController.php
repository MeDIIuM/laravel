<?php

namespace App\Http\Controllers;

use App;
use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{

    public function index($clientId)
    {
        $carsModel = new Car();
        $cars = $carsModel->getCars($clientId);
        $client = $carsModel->getClientForCar($clientId);

        return view('/cars/cars_index', [
            'cars' => $cars,
            'client' => $client,
        ]);

    }

    public function create($clientId)
    {
        return view('/cars/cars_add', [
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

        $carPropertiesAdd = [
            "brand" => $brand,
            "colour" => $colour,
            "model" => $model,
            "number" => $number,
            "station" => $station
        ];

        $carsModel = new Car();
        $carsModel->addCar($clientId, $carPropertiesAdd);

        return redirect('/clients/' . $clientId . "/cars");
    }

    public function destroy($clientId, $car)
    {
        $carsModel = new Car();
        $carsModel->deleteCar($car);

        return redirect('/clients/' . $clientId . '/cars');

    }

    public function edit($clientId, $id)
    {
        $carsModel = new Car();
        $car = $carsModel->getCarById($id);

        return view('/cars/cars_update', [
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

        $carPropertiesUpdate = [
            "brand" => $brand,
            "colour" => $colour,
            "model" => $model,
            "number" => $number,
            "station" => $station
        ];

        $carsModel = new Car();
        $carsModel->updateCar($id, $carPropertiesUpdate);
        return redirect('/clients/' . $clientId . "/cars");

    }

}