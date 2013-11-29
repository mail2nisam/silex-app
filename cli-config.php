<?php
require_once 'vendor/autoload.php';
use Doctrine\ORM\Tools\Console\ConsoleRunner;


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode =true;
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'calpine',
    'dbname'   => 'smartprob_new',
    'mapping_types'=>array('enum'=>'string')
);
//mapping_types:
//            enum: string
//            set: string
//            varbinary: string
//            tinyblob: text
//echo __DIR__."/src/Entities";
$paths = array("entity/mappings");
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entities"), $isDevMode, null, null, false);;//= Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
$platform = $entityManager->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

return ConsoleRunner::createHelperSet($entityManager);
