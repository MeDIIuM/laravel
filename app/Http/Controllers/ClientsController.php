<?php

namespace App\Http\Controllers;

use App\Clients;
use http\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index(){
        $clients = \DB::table('clients')
            ->select('*', \DB::raw('(select count(*) from cars where cars.client_id = clients.id) as \'cars\''))
            ->orderBy('created_at', 'asc')
            ->paginate(5);

        return view('index', [
            'clients' => $clients
        ]);
    }
    public function create(){
        return view('clients_create', []);
    }

    public function edit($clientId){
        $car = DB::table('client')->where('id', $clientId)>first();
        return view('cars_add', [
            'clientId' => $clientId,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'gender' =>  "required|in:m,f,м,ж",
        ]);
        if ($validator->fails()) {
            return redirect('/create')
                ->withInput()
                ->withErrors($validator);
        }
        DB::table('clients')->insert([
        "name" => $request->name,
        "gender" => $request->gender,
        "phone" => $request->phone,
        "address" => $request->address
        ]);
        return redirect('/');
    }

    public function destroy($client){
        DB::table('clients')->where('id', '=', $client)->delete();
        DB::table('cars')->where('client_id','=', $client)->delete();
        return redirect('/');
    }
}