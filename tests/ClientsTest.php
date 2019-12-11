<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Клиент')
            ->see('Вася Пупкин2')
            ->see('89876543322')
            ->see('cars(5)');
    }
    public function testAddExample()
    {
        $this->visit('/clients/create')
            ->see('Клиент')
            ->see('Имя')
            ->see('Пол')
            ->see('Номер телефона')
            ->see('Адрес проживания');
    }

}
