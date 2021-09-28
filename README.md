#                     YII2 workerman websocket

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      common/
         models/             contains model classes
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

~~~
ln -sf test.php main.php
ln -sf console_test.php main_console.php

启动 websocket
php yii workerman-web-socket -s start
~~~

WEB js DEMO
~~~
<script>
 // Create WebSocket connection.
 const ws = new WebSocket('ws://127.0.0.1:2346/'); // 这里是获取的网站的域名，测试的时候可以改为自己的本地的ip地址

 // Connection opened
 ws.addEventListener('open', function (event) {
 ws.send('Hello Server!');
 });

 // Listen for messages
 ws.addEventListener('message', function (event) {
 console.log('Message from server ', event.data);
 });

 setTimeout(function() {
 ws.send('ssssss');
 }, 10000);

</script>
~~~