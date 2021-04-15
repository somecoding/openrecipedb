<?php

use OpenRecipeDBServer\Controller\Console\PrefillController;
use Reinfi\DependencyInjection\Factory\AutoWiringFactory;


return [
    'factories' => [
        PrefillController::class         => AutoWiringFactory::class,

    ],
];
