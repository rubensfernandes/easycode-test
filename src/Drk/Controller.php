<?php 

namespace Drk;
use Drk\Uri;

class Controller {

	private $apps = array();
	private $controller;
	private $method;

	public function __construct(Uri $uri)
	{
		$this->uri = $uri;
	}

	public function setApps($apps = array())
	{
		$this->apps = $apps;
	}

	public function getApps()
	{
		return $this->apps;
	}

	public function filterApp()
	{
		$this->uri->filterAppUri($this->apps);
	}

	public function getNamespace()
	{
		return $this->uri->getNamespaceUri();
	}

	public function getController()
	{
		$firstUri = ucfirst($this->uri->getSegments(0));

		if(!$firstUri)
			return null;

		return $this->getNamespace().'\\Controllers\\'.$firstUri;
	}

	public function getMethod()
	{
		if(count($this->uri->getSegments()) < 2){
			return 'index';
		}

		return $this->uri->getSegments(1);
	}


}