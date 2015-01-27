<?php 

$loader = require_once "../vendor/autoload.php";
use Drk\Application;

ini_set('display_errors', 'on');
error_reporting(E_ALL);


$config['apps'] = array(
			'Namespace' => 'url',
			'Site' => ''
		);

$config['routerDefault'] = 'Controller';



$app = new Application($loader, $config);

$app->play();