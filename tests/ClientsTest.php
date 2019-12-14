<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientsTest extends TestCase
{

    public function testAddClient()
    {
        $testBrandCar = "Antoshas brand";
        $testColourCar = "Antoshas colour";
        $testModelCar = "Antoshas model";
        $testNumberCar = "Antosha 001";
        $testUserPhone = '89999999999';
        DB::table("cars")->where("number",'=', $testNumberCar)->delete();
        DB::table("clients")->where("phone", '=', $testUserPhone)->delete();
        $this->visit('/clients/create')
            ->see('Клиент')
            ->see('Имя')
            ->see('Пол')
            ->see('Номер телефона')
            ->see('Адрес проживания')
            ->type('Антоша Тестовый', 'name')
            ->type('m', 'gender')
            ->type($testUserPhone, 'phone')
            ->type('Antoshas steet 44', 'address');
        $this->press("Add")
            ->seePageIs('/');

        $createdClient = DB::table("clients")->where("phone", '=', $testUserPhone)->first();
        $this->assertNotEmpty($createdClient);
        $this->visit("/clients/$createdClient->id/cars/create")
            ->see('Машина:')
            ->see('Марка')
            ->see('Цвет')
            ->see('Модель')
            ->see('Гос. номер')
            ->type($testBrandCar, 'brand')
            ->type($testColourCar, 'colour')
            ->type($testModelCar, 'model')
            ->type($testNumberCar, 'number');
        $this->press("Add")
            ->seePageIs("/clients/$createdClient->id/cars");

        $this->visit("/clients/$createdClient->id/cars")
            ->see($testBrandCar)
            ->see($testColourCar)
            ->see($testModelCar)
            ->see($testNumberCar);
    }

//    @todo тест создание клиента и проверка его в списке
//@todo новый контроллер и роут со списком машин на стоянке
//@todo тест создание клиента, создание машины и проверка машины в списке, проверка, что она на стоянке
}
