<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);

use Drk\Application;
use Drk\DoctrineWrapper;

$config = array();

$config['apps'] = array('Admin'=>'');

$config['routerDefault'] = 'Controller';

$config['db'] = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '8uijkm90',
    'dbname'   => 'easycode',
);

$_loader = require '../vendor/autoload.php';


$app = new Application($_loader, $config);



/*Doctrine config*/
$docConfig['db'] = $config['db'];
$docConfig['namespace'] = $app->namespace;

$doc = new DoctrineWrapper($docConfig);

$app->setEm($doc->getEm());
/*end doctrine*/



$app->play();