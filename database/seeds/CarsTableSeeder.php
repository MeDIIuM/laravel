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
        $clients = DB::table('clients')->get();
        $colours = ['Красный', 'Синий', 'Зеленый','Баклажан', 'Мокрый асфальт'];
        $symbols = ['а',"б","в","г","д","е","ж","з","и","к"];
        $brands = ['bmv', 'Tesla', 'Лада седан', 't34', 'Бэт мобиль'];
        $models = ['v1', 'v2', 'v3', 'v4', 'v5'];
        $numOfClients=count($clients);
        $carNums = [];
        while(count($carNums)<$numOfClients) {
            $num = $symbols[array_rand($symbols,1)].rand(0,999).$symbols[array_rand($symbols,1)].$symbols[array_rand($symbols,1)];
            if (in_array($num,$carNums)) {
                continue;
            }
            $carNums[]=$num;
        }

        foreach ($clients as $v) {
            DB::table('cars')->insert([
                "client_id"=>$v->id,
                "brand"=>$brands[array_rand($brands,1)],
                "colour"=>$colours[array_rand($colours,1)],
                "model"=>$models[array_rand($models,1)],
                "number"=>array_pop($carNums),
                "station"=>rand(0, 10)%2==1,
            ]);
        }
    }
}