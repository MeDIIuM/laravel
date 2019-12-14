<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    public function index(){
        $cars = DB::table('cars')->where('station','=', true)->get();
        return view('station', [
            'cars' => $cars,
        ]);
    }
}

