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
            'open-recipe-db.rpc.request-access-key' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/requestAccessKey',
                    'defaults' => [
                        'controller' => 'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller',
                        'action' => 'requestAccessKey',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'open-recipe-db.rest.access-key',
            1 => 'open-recipe-db.rpc.request-access-key',
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
                1 => 'POST',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
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
            'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'OpenRecipeDB\\V1\\Rest\\AccessKey\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => [
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
            'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => [
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
            'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => \OpenRecipeDB\V1\Rpc\RequestAccessKey\RequestAccessKeyControllerFactory::class,
        ],
    ],
    'api-tools-rpc' => [
        'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => [
            'service_name' => 'requestAccessKey',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'open-recipe-db.rpc.request-access-key',
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'OpenRecipeDB\\V1\\Rest\\AccessKey\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => [
            'input_filter' => 'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\EmailAddress::class,
                        'options' => [
                            'useDomainCheck' => true,
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'mail',
                'description' => 'E-Mail of Service/User requesting AccessKey',
                'field_type' => 'string',
                'error_message' => 'Please add a mail',
            ],
        ],
    ],
];
