<?php 
ini_set('display_errors', 'on');
error_reporting(E_ALL);

use Drk\Application;

$config = array();

$config['apps'] = array('Admin'=>'');

$config['routerDefault'] = 'Controller';


$_loader = require '../vendor/autoload.php';

$app = new Application($_loader, $config);

$app->play();