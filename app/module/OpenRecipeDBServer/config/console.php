<?php


use OpenRecipeDBServer\Controller\Console\PrefillController;

return [
    'router' => [
        'routes' => [
            'preFill'       => [
                'options' => [
                    'route'    => 'prefill',
                    'defaults' => [
                        'controller' => PrefillController::class,
                        'action'     => 'prefill',
                    ],
                ],
            ],
        ],
    ],
];
