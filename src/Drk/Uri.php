<?php 
/**
 * This class is reponsable to read the site url and parser that
 */
namespace Drk;

class Uri{

	private $url;
	private $scheme;
	private $host;
	private $port;
	private $path;
	private $query;
	private $explodedPath;

	public function __construct($url)
	{
		$this->url = $url;
		$this->getExplodedPath();
	}

	private function parseUrl()
	{
			$urlParsed = parse_url($this->url);

			foreach ($urlParsed as $key => $value) {
				$this->$key = $value;
			}
	}

	private function explodePath()
	{
		$explodedPath = explode('/', $this->path);
		$this->explodedPath = array_values(array_filter($explodedPath));
	}

	public function getExplodedPath()
	{
		$this->parseUrl();
		$this->explodePath();

		return $this->explodedPath;
	}

	public function getSegments($i = null)
	{	
		if($i === null)
			return $this->explodedPath;

		if(isset($this->explodedPath[(int)$i]))
			return $this->explodedPath[(int)$i];
		else
			return false;
	}

	public function removeFirstUri()
	{
		unset($this->explodedPath[0]);
		$this->explodedPath = array_values($this->explodedPath);
	}

	public function filterAppUri($apps)
	{
		$firstUri = $this->getSegments(0);
        $isApp = in_array($firstUri, $apps);

        if($isApp){
        	$appNamespace = array_search($firstUri,$apps);
        	$this->AppNamespace = $appNamespace;
        	$this->removeFirstUri();
        }else{
        	$appNamespace = array_search('',$apps);

        	if(!$appNamespace)
        		throw new \Exception("Nenhuma rota encontrada!");
        	else	
        		$this->AppNamespace = $appNamespace;
        }
	}

	public function getNamespaceUri()
	{
		return $this->AppNamespace;
	}

}
