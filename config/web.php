<?php
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');
defined('YII_ENV_DEV') or define('YII_ENV_PROD', true);

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

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
    ],
    'params'     => $params,
];

return $config;
