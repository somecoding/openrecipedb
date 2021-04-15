<?php
return [
    'service_manager' => [
        'factories' => [
            \OpenRecipeDB\V1\Rest\AccessKey\AccessKeyResource::class => \OpenRecipeDB\V1\Rest\AccessKey\AccessKeyResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'open-recipe-db.rest.access-key' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/access-key[/:access_key_id]',
                    'defaults' => [
                        'controller' => 'OpenRecipeDB\\V1\\Rest\\AccessKey\\Controller',
                    ],
                ],
            ],
            'open-recipe-db.rpc.test' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/test',
                    'defaults' => [
                        'controller' => 'OpenRecipeDB\\V1\\Rpc\\Test\\Controller',
                        'action' => 'test',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'open-recipe-db.rest.access-key',
            1 => 'open-recipe-db.rpc.test',
        ],
    ],
    'api-tools-rest' => [
        'OpenRecipeDB\\V1\\Rest\\AccessKey\\Controller' => [
            'listener' => \OpenRecipeDB\V1\Rest\AccessKey\AccessKeyResource::class,
            'route_name' => 'open-recipe-db.rest.access-key',
            'route_identifier_name' => 'access_key_id',
            'collection_name' => 'access_key',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \OpenRecipeDB\V1\Rest\AccessKey\AccessKeyEntity::class,
            'collection_class' => \OpenRecipeDB\V1\Rest\AccessKey\AccessKeyCollection::class,
            'service_name' => 'AccessKey',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'OpenRecipeDB\\V1\\Rest\\AccessKey\\Controller' => 'HalJson',
            'OpenRecipeDB\\V1\\Rpc\\Test\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'OpenRecipeDB\\V1\\Rest\\AccessKey\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'OpenRecipeDB\\V1\\Rpc\\Test\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'OpenRecipeDB\\V1\\Rest\\AccessKey\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/json',
            ],
            'OpenRecipeDB\\V1\\Rpc\\Test\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \OpenRecipeDB\V1\Rest\AccessKey\AccessKeyEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'open-recipe-db.rest.access-key',
                'route_identifier_name' => 'access_key_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
            ],
            \OpenRecipeDB\V1\Rest\AccessKey\AccessKeyCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'open-recipe-db.rest.access-key',
                'route_identifier_name' => 'access_key_id',
                'is_collection' => true,
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'OpenRecipeDB\\V1\\Rpc\\Test\\Controller' => \OpenRecipeDB\V1\Rpc\Test\TestControllerFactory::class,
        ],
    ],
    'api-tools-rpc' => [
        'OpenRecipeDB\\V1\\Rpc\\Test\\Controller' => [
            'service_name' => 'test',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'open-recipe-db.rpc.test',
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'OpenRecipeDB\\V1\\Rpc\\Test\\Controller' => [
                'actions' => [
                    'test' => [
                        'GET' => true,
                        'POST' => false,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
        ],
    ],
];
