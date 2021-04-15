<?php
return [
    'service_manager' => [
        'factories' => [
            \Storage\V1\Rest\ItemCategory\ItemCategoryResource::class => \Storage\V1\Rest\ItemCategory\ItemCategoryResourceFactory::class,
            \Storage\V1\Rest\ItemDefinition\ItemDefinitionResource::class => \Storage\V1\Rest\ItemDefinition\ItemDefinitionResourceFactory::class,
            \Storage\V1\Rest\Item\ItemResource::class => \Storage\V1\Rest\Item\ItemResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'storage.rest.item-category' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/item-category[/:item_category_id]',
                    'defaults' => [
                        'controller' => 'Storage\\V1\\Rest\\ItemCategory\\Controller',
                    ],
                ],
            ],
            'storage.rest.item-definition' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/item-definition[/:item_definition_id]',
                    'defaults' => [
                        'controller' => 'Storage\\V1\\Rest\\ItemDefinition\\Controller',
                    ],
                ],
            ],
            'storage.rest.item' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/item[/:item_id]',
                    'defaults' => [
                        'controller' => 'Storage\\V1\\Rest\\Item\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'storage.rest.item-category',
            1 => 'storage.rest.item-definition',
            2 => 'storage.rest.item',
        ],
    ],
    'api-tools-rest' => [
        'Storage\\V1\\Rest\\ItemCategory\\Controller' => [
            'listener' => \Storage\V1\Rest\ItemCategory\ItemCategoryResource::class,
            'route_name' => 'storage.rest.item-category',
            'route_identifier_name' => 'item_category_id',
            'collection_name' => 'item_category',
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
            'entity_class' => \Storage\V1\Rest\ItemCategory\ItemCategoryEntity::class,
            'collection_class' => \Storage\V1\Rest\ItemCategory\ItemCategoryCollection::class,
            'service_name' => 'ItemCategory',
        ],
        'Storage\\V1\\Rest\\ItemDefinition\\Controller' => [
            'listener' => \Storage\V1\Rest\ItemDefinition\ItemDefinitionResource::class,
            'route_name' => 'storage.rest.item-definition',
            'route_identifier_name' => 'item_definition_id',
            'collection_name' => 'item_definition',
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
            'entity_class' => \Storage\V1\Rest\ItemDefinition\ItemDefinitionEntity::class,
            'collection_class' => \Storage\V1\Rest\ItemDefinition\ItemDefinitionCollection::class,
            'service_name' => 'ItemDefinition',
        ],
        'Storage\\V1\\Rest\\Item\\Controller' => [
            'listener' => \Storage\V1\Rest\Item\ItemResource::class,
            'route_name' => 'storage.rest.item',
            'route_identifier_name' => 'item_id',
            'collection_name' => 'item',
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
            'entity_class' => \Storage\V1\Rest\Item\ItemEntity::class,
            'collection_class' => \Storage\V1\Rest\Item\ItemCollection::class,
            'service_name' => 'Item',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Storage\\V1\\Rest\\ItemCategory\\Controller' => 'HalJson',
            'Storage\\V1\\Rest\\ItemDefinition\\Controller' => 'HalJson',
            'Storage\\V1\\Rest\\Item\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Storage\\V1\\Rest\\ItemCategory\\Controller' => [
                0 => 'application/vnd.storage.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Storage\\V1\\Rest\\ItemDefinition\\Controller' => [
                0 => 'application/vnd.storage.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Storage\\V1\\Rest\\Item\\Controller' => [
                0 => 'application/vnd.storage.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Storage\\V1\\Rest\\ItemCategory\\Controller' => [
                0 => 'application/vnd.storage.v1+json',
                1 => 'application/json',
            ],
            'Storage\\V1\\Rest\\ItemDefinition\\Controller' => [
                0 => 'application/vnd.storage.v1+json',
                1 => 'application/json',
            ],
            'Storage\\V1\\Rest\\Item\\Controller' => [
                0 => 'application/vnd.storage.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \Storage\V1\Rest\ItemCategory\ItemCategoryEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'storage.rest.item-category',
                'route_identifier_name' => 'item_category_id',
                'hydrator' => \Laminas\Hydrator\ClassMethodsHydrator::class,
            ],
            \Storage\V1\Rest\ItemCategory\ItemCategoryCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'storage.rest.item-category',
                'route_identifier_name' => 'item_category_id',
                'is_collection' => true,
            ],
            \Storage\V1\Rest\ItemDefinition\ItemDefinitionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'storage.rest.item-definition',
                'route_identifier_name' => 'item_definition_id',
                'hydrator' => \Laminas\Hydrator\ClassMethodsHydrator::class,
            ],
            \Storage\V1\Rest\ItemDefinition\ItemDefinitionCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'storage.rest.item-definition',
                'route_identifier_name' => 'item_definition_id',
                'is_collection' => true,
            ],
            \Storage\V1\Rest\Item\ItemEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'storage.rest.item',
                'route_identifier_name' => 'item_id',
                'hydrator' => \Laminas\Hydrator\ClassMethodsHydrator::class,
            ],
            \Storage\V1\Rest\Item\ItemCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'storage.rest.item',
                'route_identifier_name' => 'item_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'Storage\\V1\\Rest\\ItemCategory\\Controller' => [
            'input_filter' => 'Storage\\V1\\Rest\\ItemCategory\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Storage\\V1\\Rest\\ItemCategory\\Validator' => [],
    ],
];
