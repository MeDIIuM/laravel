<?php

use Illuminate\Database\Seeder;


class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<30; $i++) {
            DB::table('clients')->insert([
                'name' => "Вася Пупкин".$i,
                'gender' => "m",
                'phone'=>"8987654332".$i,
                'address'=>"улица Рог и копыт ".$i,
            ]);
        }
    }
}