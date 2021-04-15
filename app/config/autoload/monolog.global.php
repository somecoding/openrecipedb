<?php

use Monolog\Logger;

return [
    'EnliteMonolog' => [
        // Logger name
        'EnliteMonologService' => [
            // name of
            'name' => 'default',
            // Handlers, it can be service manager alias(string) or config(array)
            'handlers' => [
                'default' => [
                    'name' => 'Monolog\Handler\StreamHandler',
                    'args' => [
                        'stream' => 'data/log/application.log',
                        'level' => Logger::WARNING,
                        'bubble' => true
                    ]
                ]
            ]
        ]
    ]
];
