<?php

use Reinfi\DependencyInjection\AbstractFactory\FallbackAutoWiringFactory;
use Reinfi\DependencyInjection\Factory\AutoWiringFactory;


return [
    'factories'          => [

    ],
    'abstract_factories' => [
//        FallbackAutoWiringFactory::class, enabling this breaks laminas-doctrine-oauth for apitools
    ],

    'invokables' => [

    ],
];
