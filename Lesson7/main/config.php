<?php
return [
    'projectName' => 'Мой магазин',
    'defaultController' => 'good',
    'components' => [
        'db' => [
            'class' => \app\services\DB::class,
            'config' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'db' => 'php_1',
                'charset' => 'UTF8',
                'login' => 'root',
                'password' => 'www12345',
            ]
        ],
        'renderer' => [
            'class' => \app\services\TwigRenderServices::class,
        ],
        'goodRepository' => [
            'class' => \app\repositories\GoodRepository::class,
        ],
        'basketService' => [
            'class' => \app\services\BasketService::class,
        ],
        'userRepository' => [
            'class' => \app\repositories\UserRepository::class,
        ],
        'userService' => [
            'class' => \app\services\UserService::class,
        ],
        'request' => [
            'class' => \app\services\Request::class,
        ],
        'orderRepository' => [
            'class' => \app\repositories\OrderRepository::class,
        ],
        'orderService' => [
            'class' => \app\services\OrderService::class,
        ],
        'goodService' => [
            'class' => \app\services\GoodService::class,
        ]
    ],
];