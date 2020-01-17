<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')->where('station', '=', true)->get();
        return view('station_index', [
            'cars' => $cars,
        ]);
    }
}

