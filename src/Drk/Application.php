<?php 

namespace Drk;
use Drk\Uri;
use Drk\Controller;

class Application {

	public $controller;
	public $method;
	private $config;

	public function __construct($loader, $config)
	{

		$this->loader = $loader;
		$this->setConfig($config);
		
		$apps = $this->getConfig('apps');

		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$uri = new Uri($url);

		$controller = new Controller($uri);
		$controller->setApps($apps);

		$controller->filterApp();

		$this->namespace  = $controller->getNamespace();
		$this->controller = $controller->getController();
		$this->method     = $controller->getMethod();

		if($this->controller === null)
			$this->controller = $this->namespace.'\\Controllers\\'.$this->getConfig('routerDefault');

		$this->loader->add($this->namespace, realpath('../'));
	}

	public function getConfig($i)
	{
		return $this->config[$i];
	}

	public function setConfig($config = array())
	{
		$this->config = $config;
	}

	public function play()
	{	
		$class  = new $this->controller;
		$method = $this->method;

		if(method_exists($class, $method))
			$class->$method();
		else
			echo 'sua classe deve ter ao menos um metodo index()';
	}

}