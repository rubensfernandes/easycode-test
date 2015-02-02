<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Drk\DoctrineWrapper;

$config['db'] = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '8uijkm90',
    'dbname'   => 'easycode',
);

$_loader = require 'vendor/autoload.php';

$docConfig['db'] = $config['db'];
$docConfig['namespace'] = 'Admin';


$doc = new DoctrineWrapper($docConfig);

$entityManager = $doc->getEm();


return ConsoleRunner::createHelperSet($entityManager);