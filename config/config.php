<?php
//define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../");
//define("TEMPLATES_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../views/");
//define("CONTROLLER_NAMESPACE", "app\\controllers\\");
//define("TWIGTEMPLATES_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../twigtemplates/");


use app\engine\Request;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;
use app\models\repositories\OrderRepository;
use app\engine\Db;

return [
    'root_dir' => __DIR__ . "/../",
    'templates_dir' => __DIR__ . "/../views/",
    'controllers_namespaces' => 'app\controllers\\',
    'showFrom' => 0,
    'showCount' => 5,
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'database',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        //По хорошему сделать для репозиториев отедьное простое хранилище
        //без reflection
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ]
    ]
];