<?php

return [


    'fetch' => PDO::FETCH_CLASS,


    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel1'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', '123'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],

    ],

    'migrations' => 'migrations',

];
