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
        $genders = ['m', 'f'];
        $names = ['Вася', 'Петя', 'Дима', 'Коля', 'Егор'];
        $surname = ['Иванов', 'Петров', 'Сидоров', 'Васечкин', 'Русаков'];
        $streets = ['Ленина', 'Мира', 'Пархоменко', 'Советская', 'Чуйкова'];
        for ($i = 0; $i < 30; $i++) {
            DB::table('clients')->insert([
                'name' => $names[array_rand($names, 1)] . ' ' . $surname[array_rand($surname, 1)],
                'gender' => $genders[array_rand($genders, 1)],
                'phone' => random_int(89000000000, 89999999999),
                'address' => "улица " . $streets[array_rand($streets, 1)] . ' дом ' . random_int(1, 50),
            ]);
        }
    }
}