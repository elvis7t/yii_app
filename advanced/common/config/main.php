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
        'formatter' => [
            'dateFormat' => 'dd-MM-yyyy ss:mm:HH',        
        ],
        'assetManager' => [
            'appendTimestamp' => true
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class
        ]
    ],
];
