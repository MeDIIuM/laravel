<?php

namespace Tests;

use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;

class ClientsTest extends DuskTestCase
{
    public function testAddClient()
    {

        $this->browse(function (Browser $browser) {
            $testBrandCar = "Antoshas brand";
            $testColourCar = "Antoshas colour";
            $testModelCar = "Antoshas model";
            $testNumberCar = "Antosha 001";
            $testBrandCar2 = "Antoshas brand2";
            $testColourCar2 = "Antoshas colour2";
            $testModelCar2 = "Antoshas model2";
            $testNumberCar2 = "Antosha 002";
            $testUserPhone = '000000000';
            DB::table("cars")->where("number", '=', $testNumberCar)->delete();
            DB::table("cars")->where("number", '=', $testNumberCar2)->delete();
            DB::table("clients")->where("phone", '=', $testUserPhone)->delete();
            $browser->visit('/clients/create')
                ->assertSee('Клиент')
                ->assertSee('Имя')
                ->assertSee('Пол')
                ->assertSee('Номер телефона')
                ->assertSee('Адрес проживания')
                ->type('Антоша Тестовый', 'name')
                ->type('m', 'gender')
                ->type($testUserPhone, 'phone')
                ->type('Antoshas steet 44', 'address');
            $browser->press("Add")
                ->seePageIs('/');

            $createdClient = DB::table("clients")->where("phone", '=', $testUserPhone)->first();
            $this->assertNotEmpty($createdClient);
            $browser->visit("/clients/$createdClient->id/cars/create")
                ->assertSee('Машина:')
                ->assertSee('Марка')
                ->assertSee('Цвет')
                ->assertSee('Модель')
                ->assertSee('Гос. номер')
                ->type($testBrandCar, 'brand')
                ->type($testColourCar, 'colour')
                ->type($testModelCar, 'model')
                ->type($testNumberCar, 'number')
                ->check('station');
            $browser->press("Add")
                ->seePageIs("/clients/$createdClient->id/cars");

            $browser->visit("/clients/$createdClient->id/cars")
                ->assertSee($testBrandCar)
                ->assertSee($testColourCar)
                ->assertSee($testModelCar)
                ->assertSee($testNumberCar)
                ->assertSee('1');
            $browser->visit("/clients/$createdClient->id/cars/create")
                ->assertSee('Машина:')
                ->assertSee('Марка')
                ->assertSee('Цвет')
                ->assertSee('Модель')
                ->assertSee('Гос. номер')
                ->type($testBrandCar2, 'brand')
                ->type($testColourCar2, 'colour')
                ->type($testModelCar2, 'model')
                ->type($testNumberCar2, 'number');
            $browser->press("Add")
                ->seePageIs("/clients/$createdClient->id/cars");

            $browser->visit("/clients/$createdClient->id/cars")
                ->assertSee($testBrandCar2)
                ->assertSee($testColourCar2)
                ->assertSee($testModelCar2)
                ->assertSee($testNumberCar2)
                ->assertSee('0');
            DB::table("cars")->where("number", '=', $testNumberCar)->delete();
            DB::table("cars")->where("number", '=', $testNumberCar2)->delete();
            DB::table("clients")->where("phone", '=', $testUserPhone)->delete();
        });

    }
}