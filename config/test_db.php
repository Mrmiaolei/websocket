<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=localhost;port=8889;dbname=websocket';
$db['username'] = 'root';
$db['password'] = 'ml99330508';
return $db;
