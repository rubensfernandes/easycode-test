<?php 
/**
 * This class is reponsable to read the site url and parser that
 */

class Uri{

	private $url;
	private $scheme;
	private $host;
	private $port;
	private $path;
	private $query;

	private $explodedPath;


	public function setUrl($url = null)
	{
		$this->url = $url != null ? $url : "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

	public function parserUrl()
	{
		$urlParsed = parse_url($this->url);

		foreach ($urlParsed as $key => $value) {
			$this->$key = $value;
		}

		return $urlParsed; 
	}

	public function explodePath()
	{
		$explodedPath = explode('/', $this->path);
		$this->explodedPath = array_values(array_filter($explodedPath));

		return $this->explodedPath;
	}

	public function getExplodedPath()
	{
		$this->setUrl();
		$this->parserUrl();
		$this->explodePath();

		return $this->explodedPath;
	}

}

$uri = new Uri;
$uri->setUrl();
$uri->parserUrl();
var_dump($uri->getExplodedPath());