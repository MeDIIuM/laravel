<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clients extends Model
{
    public function getClients() {
        return \DB::table('clients')
            ->select('*' , \DB::raw('(select count(*) from cars where cars.client_id = clients.id) as \'cars\''))
            ->orderBy('created_at', 'asc')
            ->paginate(5);
    }
    public function getClientById($clientId){
        return \DB::table('clients')
            ->where('id', '=', $clientId)->first();
    }
    public function addClient($name,$gender,$phone,$address){
        \DB::table('clients')->insert([
            "name" => $name,
            "gender" => $gender,
            "phone" => $phone,
            "address" => $address
        ]);
    }
    public function updateClient($clientId,$name,$gender,$phone,$address){
        \DB::table("clients")->where('id', '=', $clientId)->update([
            "name" => $name,
            "gender" => $gender,
            "phone" => $phone,
            "address" => $address
        ]);

    }
    public function deleteClient($client){
        \DB::table('clients')->where('id', '=', $client)->delete();
        \DB::table('cars')->where('client_id', '=', $client)->delete();
    }
}
