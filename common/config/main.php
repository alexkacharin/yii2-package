<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],

    ],
    'language' => 'ru-RU',
    'modules' => [
        'user' => [
            'class' => Da\User\Module::class,
        ],
    ],
];
