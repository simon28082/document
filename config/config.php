<?php
return [
    'database' => [
        'default' => 'mongodb',
        'connections' =>[
            'mongodb' => [
                'driver'   => 'mongodb',
                'host'     => '127.0.0.1',
                'port'     => 27017,
                'database' => 'document',
                'username' => '',
                'password' => '',
                'options'  => [
                    // sets the authentication database required by mongo 3
                    'database' => 'admin'
                ]
            ]
        ]
    ],
    'app' => [
        'providers'  => [Jenssegers\Mongodb\MongodbServiceProvider::class],
        'locale' => 'zh-CN',
        'fallback_locale' => 'en',
    ]

];