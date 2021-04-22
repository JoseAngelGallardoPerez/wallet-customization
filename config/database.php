<?php
return [

    'default' => 'mysql',
    'migrations' => 'migrations',
    'connections' => [
        'mysql' => [
            'driver'    => env('VELMIE_WALLET_CUSTOMIZATION_DB_DRIV', 'mysql'),
            'port'      => env('VELMIE_WALLET_CUSTOMIZATION_DB_PORT', '3306'),
            'database'  => env('VELMIE_WALLET_CUSTOMIZATION_DB_NAME', 'customization'),
            'host'      => env('VELMIE_WALLET_CUSTOMIZATION_DB_HOST'),
            'username'  => env('VELMIE_WALLET_CUSTOMIZATION_DB_USER'),
            'password'  => env('VELMIE_WALLET_CUSTOMIZATION_DB_PASS'),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
            'timezone'  => '+00:00',
            'strict'    => false,
        ]
    ]
];
