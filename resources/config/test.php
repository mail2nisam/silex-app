<?php

$app['debug'] = true;

$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'smart_pro',
    'user'     => 'root',
    'password' => 'calpine',
);

$app['security.users'] = array('username' => array('ROLE_USER', 'password'));
