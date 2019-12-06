<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function index($client){
        $cars = DB::table('cars')->where('client_id', $client)->get();
        $clientData = DB::table('clients')->where('id', $client)->first();
        return view('cars', [
            'cars' => $cars,
            'client' => $clientData,
        ]);
    }

    public function create($client){

        return view('cars_add', [
            'clientId' => $client,
        ]);
    }

    public function store($clientId, Request $request){
        $validator = Validator::make($request->all(), [
            'number' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return redirect('/'.$clientId."/cars")
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
        return redirect('/'.$clientId."/cars");
    }

    public function destroy($client, $car){
        DB::table('cars')->where('id','=', $car)->delete();
        return redirect('/');
    }


    public function edit($client, $id){
        $car = DB::table('cars')->where('id', $id)>get();
        return view('cars_add', [
            'clientId' => $client,
        ]);
    }

//    public function update($clientId, Request $request){
//        $validator = Validator::make($request->all(), [
//            'number' => 'required|max:255'
//        ]);
//        if ($validator->fails()) {
//            return redirect('/'.$clientId."/cars")
//                ->withInput()
//                ->withErrors($validator);
//        }
//        DB::table("cars")->update([
//            "client_id"=>$clientId,
//            "brand"=>$request->brand,
//            "colour"=>$request->colour,
//            "model"=>$request->model,
//            "number"=>$request->number,
//            "station"=>$request->station,
//        ]);
//        // 1/edit   - client
////        1/cars/2/edit   - car
//        return redirect('/'.$clientId."/cars");
//    }

}