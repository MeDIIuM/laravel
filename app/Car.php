<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{

    public function getCars($clientId)
    {
        return $cars = DB::table('cars')->where('client_id', $clientId)->get();

    }


    public function getClientForCar($clientId)
    {
        return $client = DB::table('clients')->where('id', $clientId)->first();
    }


    public function addCar($clientId, $carPropertiesAdd)
    {

        DB::table('cars')->insert([
            "client_id" => $clientId,
            "brand" => $carPropertiesAdd['brand'],
            "colour" => $carPropertiesAdd['colour'],
            "model" => $carPropertiesAdd['model'],
            "number" => $carPropertiesAdd['number'],
            "station" => $carPropertiesAdd['station'] == 'on'
        ]);

    }


    public function getCarById($id)
    {
        return DB::table('cars')->where('id', '=', $id)->first();

    }


    public function updateCar($id, $carPropertiesUpdate)
    {
        DB::table("cars")->where('id', '=', $id)->update([
            "brand" => $carPropertiesUpdate['brand'],
            "colour" => $carPropertiesUpdate['colour'],
            "model" => $carPropertiesUpdate['model'],
            "number" => $carPropertiesUpdate['number'],
            "station" => $carPropertiesUpdate['station'] == 'on'
        ]);

    }


    public function deleteCar($car)
    {
        DB::table('cars')->where('id', '=', $car)->delete();
    }
}