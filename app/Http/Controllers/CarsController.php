<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function index($clientId){
        $cars = DB::table('cars')->where('client_id', $clientId)->get();
        $client = DB::table('clients')->where('id', $clientId)->first();
        return view('cars', [
            'cars' => $cars,
            'client' => $client,
        ]);
    }

    public function create($clientId){
        return view('cars_add', [
            'clientId' => $clientId,
        ]);
    }

    public function store($clientId, Request $request){
        $validator = Validator::make($request->all(), [
            'brand' => 'required|max:255',
            'colour' => 'required|max:255',
            'model' => 'required|max:255',
            'number' => 'required|max:255',
            'station' => 'boolean'
        ]);
        if ($validator->fails()) {
            return redirect('/clients/'.$clientId."/cars")
                ->withInput()
                ->withErrors($validator);
        }
        DB::table('cars')->insert([
            "client_id"=>$clientId,
            "brand"=>$request->brand,
            "colour"=>$request->colour,
            "model"=>$request->model,
            "number"=>$request->number,
            "station"=>$request->station == 'on',
        ]);
        return redirect('/clients/'.$clientId."/cars");
    }

    public function destroy($clientId, $car){
        DB::table('cars')->where('id','=', $car)->delete();
        return redirect('/clients/'.$clientId.'/cars');
    }


    public function edit($clientId, $id){
        $car = DB::table('cars')->where('id','=', $id)->first();
        return view('cars_update', [
            'clientId' => $clientId,
            'car' => $car,
        ]);
    }

    public function update($clientId,$id, Request $request){
        $validator = Validator::make($request->all(), [
            'brand' => 'required|max:255',
            'colour' => 'required|max:255',
            'model' => 'required|max:255',
            'number' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return redirect('/clients/'.$clientId."/cars")
                ->withInput()
                ->withErrors($validator);
        }
        DB::table("cars")->where('id', '=',$id)->update([
            "brand"=>$request->brand,
            "colour"=>$request->colour,
            "model"=>$request->model,
            "number"=>$request->number,
            "station"=>$request->station,
        ]);
        return redirect('/clients/'.$clientId."/cars");
    }

}