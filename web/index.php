<?php
// comment out the following two lines when deployed to production
$config = require __DIR__ . '/../config/main.php';

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/bootstrap.php';


if(YII_ENV_DEV) {
    $cors = true;
    $url = '*';

}else{
    // 线上环境指定域名跨域
    $cors = isset( $_SERVER[ 'HTTP_ORIGIN' ] ) && in_array( $_SERVER[ 'HTTP_ORIGIN' ], [] );//TODO
    if( $cors ) $url = $_SERVER[ 'HTTP_ORIGIN' ];
}
if( $cors ) {//跨域设置
    header( "Access-Control-Allow-Credentials: true" );
    header( "Access-Control-Allow-Origin: " . $url );
    header( "Access-Control-Max-age: 86400" );
    header( 'Access-Control-Allow-Methods:*' );
    header( "Access-Control-Allow-Headers: *, X-Requested-With, Content-Type,DNT,Keep-Alive,User-Agent,Cache-Control,Authorization" );
}

$application = new yii\web\Application($config);
$application->run();

