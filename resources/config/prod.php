<?php

// Local
$app['locale'] = 'en';
$app['session.default_locale'] = $app['locale'];
$app['translator.messages'] = array(
    'en' => __DIR__.'/../resources/locales/en.yml',
);

// Cache
$app['cache.path'] = __DIR__ . '/../cache';

// Http cache
$app['http_cache.cache_dir'] = $app['cache.path'] . '/http';

// Twig cache
$app['twig.options.cache'] = $app['cache.path'] . '/twig';
$app['paypal.config'] = array (
 	'mode' => 'sandbox' , 
 	'acct1.UserName' => 'nisamudheen_calpine_api1.yahoo.com',
	'acct1.Password' => '1387277434', 
	'acct1.Signature' => 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-AUhgs2R.MkS8kUP2pOUFTzKXSVDF'
);

// Assetic
$app['assetic.enabled']              = true;
$app['assetic.path_to_cache']        = $app['cache.path'] . '/assetic' ;
$app['assetic.path_to_web']          = __DIR__ . '/../../web/assets';
$app['assetic.input.path_to_assets'] = __DIR__ . '/../assets';

$app['assetic.input.path_to_css']       = $app['assetic.input.path_to_assets'] . '/less/style.less';
$app['assetic.output.path_to_css']      = 'css/styles.css';
$app['assetic.input.path_to_js']        = array(
    __DIR__.'/../../vendor/twitter/bootstrap/js/bootstrap-tooltip.js',
    __DIR__.'/../../vendor/twitter/bootstrap/js/*.js',
    $app['assetic.input.path_to_assets'] . '/js/script.js',
);
$app['assetic.output.path_to_js']       = 'js/scripts.js';

// Doctrine (db)
$app['db.options'] = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'dbname'   => 'smartprob_new',
    'user'     => 'root',
    'password' => 'calpine',
);
//$app['swiftmailer.options'] = array(
//    'host' => 'smtp.gmail.com',
//    'port' => '465',
//    'username' => 'mail2nisam@gmail.com',
//    'password' => 'same2you',
//    'encryption' => null,
//    'auth_mode' => null
//);
// User
$app['security.users'] = array('username' => array('ROLE_USER', 'password'));
