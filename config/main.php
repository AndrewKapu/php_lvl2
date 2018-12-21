<?php
return [
    'rootDir' => __DIR__ . '/../',
    'templatesDir' => __DIR__ . '/../views/',
    'defaultController' => 'product',
    'controllerNamespaces' => "app\\controllers\\",
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'rose',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => \app\services\Request::class,
        ],
        'renderer' => [

        ],
        'session' => [
            'class' => \app\services\Session::class,
        ]
    ]

];