<?php
return [
    'service_manager' => [
        'factories' => [
            \OpenRecipeDB\V1\Rest\Recipes\RecipesResource::class => \OpenRecipeDB\V1\Rest\Recipes\RecipesResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
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
            'open-recipe-db.rest.recipes' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/recipes[/:recipes_id]',
                    'defaults' => [
                        'controller' => 'OpenRecipeDB\\V1\\Rest\\Recipes\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            1 => 'open-recipe-db.rpc.request-access-key',
            0 => 'open-recipe-db.rest.recipes',
        ],
    ],
    'api-tools-rest' => [
        'OpenRecipeDB\\V1\\Rest\\Recipes\\Controller' => [
            'listener' => \OpenRecipeDB\V1\Rest\Recipes\RecipesResource::class,
            'route_name' => 'open-recipe-db.rest.recipes',
            'route_identifier_name' => 'recipes_id',
            'collection_name' => 'recipes',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \OpenRecipeDB\V1\Rest\Recipes\RecipesEntity::class,
            'collection_class' => \OpenRecipeDB\V1\Rest\Recipes\RecipesCollection::class,
            'service_name' => 'Recipes',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => 'HalJson',
            'OpenRecipeDB\\V1\\Rest\\Recipes\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'OpenRecipeDB\\V1\\Rest\\Recipes\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'OpenRecipeDB\\V1\\Rpc\\RequestAccessKey\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/json',
            ],
            'OpenRecipeDB\\V1\\Rest\\Recipes\\Controller' => [
                0 => 'application/vnd.open-recipe-db.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \OpenRecipeDB\V1\Rest\Recipes\RecipesEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'open-recipe-db.rest.recipes',
                'route_identifier_name' => 'recipes_id',
                'hydrator' => \Laminas\Hydrator\ReflectionHydrator::class,
            ],
            \OpenRecipeDB\V1\Rest\Recipes\RecipesCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'open-recipe-db.rest.recipes',
                'route_identifier_name' => 'recipes_id',
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
        'authorization' => [],
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
