<?php

namespace Drk;

class Loader {

	private $namespace;

	public function __construct($namespace)
	{
		$this->namespace = $namespace;
	}

	public function view($view)
	{
		require_once '../'.$this->namespace.'/Views/'.$view.'.php';
	}

}