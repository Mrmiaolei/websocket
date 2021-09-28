<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_ENV_DEV') or define('YII_ENV_DEV', true);

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/test_db.php';

/**
 * Application configuration shared by all test types
 */
$config = [
    'id'         => 'basic-tests',
    'basePath'   => dirname(__DIR__),
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language'   => 'zh-CN',
    'components' => [
        'db'         => $db,
        'mailer'     => [
            'useFileTransport' => true,
        ],
        'websocket' => [
            'class' => '\yiiplus\websocket\swoole\WebSocket',
            'host' => '127.0.0.1',
            'port' => 9501,
            'channels' => [
                'push-message' => '\socket\channels\PushMessageChannel', // 配置 channel 对应的执行类
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
            ],
        ],
        'user'       => [
            'identityClass' => 'common\models\User',
        ],
        'request'    => [
            'enableCsrfValidation' => false,
            'parsers'             => [
                'application/json' => 'yii\web\JsonParser'
            ],
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],
        'session'    => [
            'class'     => 'yii\redis\Session',
            'timeout'   => 86400,
            'keyPrefix' => 'api_',
            'redis'     => [
                'class'    => 'yii\redis\Connection',
                'hostname' => 'localhost',
                'port'     => 6379,
                'database' => 0
            ],
        ],
        'redis'      => [
            'class'    => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port'     => 6379,
            'database' => 0
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://username:password@localhost:27017/test'
        ]
    ],
    'params'     => $params,

    'bootstrap' => [
        'websocket',
        'debug',
        'gii'
    ],
    'modules' => [
        'debug' =>[
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1']
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1']
        ]
    ]
];

return $config;
