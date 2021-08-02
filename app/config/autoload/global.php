<?php
return [
    'api-tools-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\\DBAL\\Driver\\PDO\\MySQL\\Driver',
                'params' => [
                    'host' => 'ordb-mysql',
                    'port' => '3306',
                    'user' => 'app',
                    'password' => 'app',
                    'dbname' => 'app',
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'metadata_cache' => \redis::class,
                'query_cache' => \redis::class,
                'result_cache' => \redis::class,
                'hydration_cache' => \redis::class,
            ],
        ],
        'cache' => [
            \redis::class => [
                'namespace' => 'Db_Doctrine_Development',
                'instance' => 'RedisCache',
            ],
        ],
        'migrations_configuration' => [
            'orm_default' => [
                \directory::class => 'data/Migrations/',
                'name' => 'Doctrine Database Migrations',
                'namespace' => 'Migrations',
                'table' => 'migrations',
            ],
        ],
    ],
    'reinfi.dependencyInjection' => [
        'cache' => 'Memory',
        'cache_options' => [],
        'cache_plugins' => [],
    ],
    \redis::class => [
        'port' => 6379,
        'host' => \redis::class,
    ],
    'api-tools-mvc-auth' => [
        'authentication' => [
            'map' => [
                'OpenRecipeDB\\V1' => 'api-token',
            ],
        ],
    ],
];
