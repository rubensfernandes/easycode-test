<?php 
namespace Drk;
use Drk\Uri;
use Drk\Controller;

class ControllerTest extends \PHPUnit_Framework_TestCase{

	public function testIfAppsSet()
	{
		$apps = array(
			'url' => 'Namespace'
		);

		$url = 'http://site.com.br/url/controller/method';
		$uri = new Uri($url);

		$controller = new Controller($uri);
		$controller->setApps($apps);

		$expect = array('url' => 'Namespace');
		$appsController = $controller->getApps();

		$this->assertEquals($expect,$appsController);

	}

	public function testRemovePathAppDir()
	{
		$apps = array(
			'Namespace' => 'url'
		);

		$url = 'http://site.com.br/url/controller/method';
		$uri = new Uri($url);

		$controller = new Controller($uri);
		$controller->setApps($apps);

		$controller->filterApp();

		$c = $controller->getController();
		$m = $controller->getMethod();

		$expectC = 'Namespace\Controllers\Controller';
		$expectM = 'method';

		$this->assertEquals($expectC,$c);
		$this->assertEquals($expectM,$m);



		$url = 'http://site.com.br/url/controller';

		$uri = new Uri($url);

		$controller = new Controller($uri);
		$controller->setApps($apps);

		$controller->filterApp();

		$c = $controller->getController();
		$m = $controller->getMethod();

		$expectC = 'Namespace\Controllers\Controller';
		$expectM = 'index';

		$this->assertEquals($expectC,$c);
		$this->assertEquals($expectM,$m);


	}
	
}