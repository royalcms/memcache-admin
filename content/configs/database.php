<?php
defined('IN_ECJIA') or exit('No permission resources.');
return array(

    'fetch' => PDO::FETCH_ASSOC,


    'connections' => array(
        'mysql' => array(
            'driver'      => 'mysql',
            'host'        => env('DB_HOST', 'localhost'),
            'database'    => env('DB_DATABASE', 'ecjia'),
            'username'    => env('DB_USERNAME', 'ecjia'),
            'password'    => env('DB_PASSWORD', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => env('DB_PREFIX', 'ecs_'),
            'port'        => env('DB_PORT', 3306),
            'strict'      => false,
            'unix_socket' => env('DB_SOCKET', ''),
        ),

        'ecjia' => array(
            'host'        => env('DB_ECJIA_HOST', 'localhost'),
            'driver'      => 'mysql',
            'database'    => env('DB_ECJIA_DATABASE', 'ecjia'),
            'username'    => env('DB_ECJIA_USERNAME', 'ecjia'),
            'password'    => env('DB_ECJIA_PASSWORD', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => env('DB_ECJIA_PREFIX', 'ecjia_'),
            'port'        => env('DB_ECJIA_PORT', 3306),
            'strict'      => false,
            'unix_socket' => env('DB_ECJIA_SOCKET', ''),
        ),
    ),

    'redis' => array(

        'client' => 'predis', //phpredis, predis

        'cluster' => false,

        // 这是redis的默认连接，保留即可
        'default' => array(
            'host'     => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DEFAULT_DB', 0),
        ),

        // 新建名为cache的连接，用于保存缓存
        'cache' => array(
            'host'      => env('REDIS_HOST', '127.0.0.1'),
            'password'  => env('REDIS_PASSWORD', null),
            'port'      => env('REDIS_PORT', 6379),
            'database'  => env('REDIS_CACHE_DB', 1),
        ),

        // 新建名为session的连接，用于保存session
        'session' => array(
            'host'     => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => env('REDIS_SESSION_DB', 2),
        ),

        // 新建名为queue的连接，用于保存队列
        'queue' => array(
            'host'      => env('REDIS_HOST', '127.0.0.1'),
            'password'  => env('REDIS_PASSWORD', null),
            'port'      => env('REDIS_PORT', 6379),
            'database'  => env('REDIS_QUEUE_DB', 3),
        ),

    ),
);

// end