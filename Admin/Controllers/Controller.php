<?php 

namespace Admin\Controllers;

class Controller {

	public function index()
	{
		echo $this->loader->view('home');
	}

}