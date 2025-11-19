<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Adventskalender',
    'description' => 'Adventskalender Extension mit Türchen-Management',
    'category' => 'plugin',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.99.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Hamstah\\Adventskalender\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Andre Sancken',
    'author_email' => 'hamstahstudio@gmail.com',
    'author_company' => 'Hamstah Studio',
    'version' => '1.1.0',
];
