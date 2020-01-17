<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cars extends Model
{
    public function getCars($clientId){
        return $cars = DB::table('cars')->where('client_id', $clientId)->get();

    }
    public function getClientForCar($clientId){
        return $client = DB::table('clients')->where('id', $clientId)->first();
    }
    public function addCar($clientId, $brand, $colour, $model, $number, $station){
        DB::table('cars')->insert([
            "client_id" => $clientId,
            "brand" => $brand,
            "colour" => $colour,
            "model" => $model,
            "number" => $number,
            "station" => $station == 'on'
    ]);}
    public function getCarById($id){
        return DB::table('cars')->where('id', '=', $id)->first();

    }
    public function updateCar($id, $brand, $colour, $model, $number, $station){
        DB::table("cars")->where('id', '=', $id)->update([
            "brand" => $brand,
            "colour" => $colour,
            "model" => $model,
            "number" => $number,
            "station" => $station == 'on'
        ]);
    }
    public function deleteCar($car){
        DB::table('cars')->where('id', '=', $car)->delete();
    }
}