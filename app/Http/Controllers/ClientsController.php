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
        $clientModel= new Clients();
        $clients = $clientModel->getClients();
        return view('clients_index', [
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return view('clients_create', []);
    }

    public function edit($clientId)
    {
        $clientModel= new Clients();
        $client = $clientModel->getClientById($clientId);
        if (empty($client)) {
            return redirect('/');
        }
        return view('clients_update', [
            'client' => $client,
            'clientId' => $clientId
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'gender' => "required|in:m,f",
            'phone' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/clients/create')
                ->withInput()
                ->withErrors($validator);
        }
        $name = $request->input('name');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $clientModel= new Clients();
        $clientModel->addClient($name,$gender,$phone,$address);
        return redirect('/');
    }

    public function update($clientId, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'gender' => "required|in:m,f",
            'phone' => 'required|max:50',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/clients/' . $clientId . '/edit')
                ->withInput()
                ->withErrors($validator);
        }
        $name = $request->input('name');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $clientModel= new Clients();
        $clientModel->updateClient($clientId, $name,$gender,$phone,$address);
        return redirect('/clients');
    }

    public function destroy($client)
    {
        $clientModel= new Clients();
        $clientModel->deleteClient($client);
        return redirect('/');
    }
}