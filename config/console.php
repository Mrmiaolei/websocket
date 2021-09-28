<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','websocket'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'websocket' => [
            'class' => '\yiiplus\websocket\swoole\WebSocket',
            'host' => '127.0.0.1',
            'port' => 9501,
            'channels' => [
                'push-message' => '\socket\channels\PushMessageChannel', // 配置 channel 对应的执行类
            ],
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://username:password@localhost:27017/test'
        ]
    ],
    'params' => $params,
    'controllerMap' => [
        'websocket' => [
            'class' => '\yiiplus\websocket\swoole\WebSocket',
            'host' => '127.0.0.1',
            'port' => 9501,
            'channels' => [
                'push-message' => '\socket\channels\PushMessageChannel', // 配置 channel 对应的执行类
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
