<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            "client_id"=>1,
            "brand"=>"tesla",
            "colour"=>"red",
            "model"=>"hot",
            "number"=>"chili peppers",
            "station"=>false,
        ]);
    }
}