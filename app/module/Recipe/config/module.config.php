<?php
return [
    'service_manager' => [
        'factories' => [
            \Recipe\V1\Rest\Recipe\RecipeResource::class => \Recipe\V1\Rest\Recipe\RecipeResourceFactory::class,
            \Recipe\V1\Rest\Ingredient\IngredientResource::class => \Recipe\V1\Rest\Ingredient\IngredientResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'recipe.rest.recipe' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/recipe[/:recipe_id]',
                    'defaults' => [
                        'controller' => 'Recipe\\V1\\Rest\\Recipe\\Controller',
                    ],
                ],
            ],
            'recipe.rest.ingredient' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/ingredient[/:ingredient_id]',
                    'defaults' => [
                        'controller' => 'Recipe\\V1\\Rest\\Ingredient\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'recipe.rest.recipe',
            1 => 'recipe.rest.ingredient',
        ],
    ],
    'api-tools-rest' => [
        'Recipe\\V1\\Rest\\Recipe\\Controller' => [
            'listener' => \Recipe\V1\Rest\Recipe\RecipeResource::class,
            'route_name' => 'recipe.rest.recipe',
            'route_identifier_name' => 'recipe_id',
            'collection_name' => 'recipe',
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
            'entity_class' => \Recipe\V1\Rest\Recipe\RecipeEntity::class,
            'collection_class' => \Recipe\V1\Rest\Recipe\RecipeCollection::class,
            'service_name' => 'Recipe',
        ],
        'Recipe\\V1\\Rest\\Ingredient\\Controller' => [
            'listener' => \Recipe\V1\Rest\Ingredient\IngredientResource::class,
            'route_name' => 'recipe.rest.ingredient',
            'route_identifier_name' => 'ingredient_id',
            'collection_name' => 'ingredient',
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
            'entity_class' => \Recipe\V1\Rest\Ingredient\IngredientEntity::class,
            'collection_class' => \Recipe\V1\Rest\Ingredient\IngredientCollection::class,
            'service_name' => 'Ingredient',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Recipe\\V1\\Rest\\Recipe\\Controller' => 'HalJson',
            'Recipe\\V1\\Rest\\Ingredient\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Recipe\\V1\\Rest\\Recipe\\Controller' => [
                0 => 'application/vnd.recipe.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Recipe\\V1\\Rest\\Ingredient\\Controller' => [
                0 => 'application/vnd.recipe.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Recipe\\V1\\Rest\\Recipe\\Controller' => [
                0 => 'application/vnd.recipe.v1+json',
                1 => 'application/json',
            ],
            'Recipe\\V1\\Rest\\Ingredient\\Controller' => [
                0 => 'application/vnd.recipe.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \Recipe\V1\Rest\Recipe\RecipeEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'recipe.rest.recipe',
                'route_identifier_name' => 'recipe_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
            ],
            \Recipe\V1\Rest\Recipe\RecipeCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'recipe.rest.recipe',
                'route_identifier_name' => 'recipe_id',
                'is_collection' => true,
            ],
            \Recipe\V1\Rest\Ingredient\IngredientEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'recipe.rest.ingredient',
                'route_identifier_name' => 'ingredient_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
            ],
            \Recipe\V1\Rest\Ingredient\IngredientCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'recipe.rest.ingredient',
                'route_identifier_name' => 'ingredient_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'Recipe\\V1\\Rest\\Recipe\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
