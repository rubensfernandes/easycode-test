<?php 
namespace Drk;
use Drk\Uri;

class UriTest extends \PHPUnit_Framework_TestCase{


	/**
	 * @dataProvider urlsToTest
	 */
	public function testIfUriParseCorrect($url, $expect)
	{
		$uri = new Uri($url);
		
		$paths = $uri->getExplodedPath();

		$this->AssertEquals($expect, $paths);
	}

	public function testIfGetSegmentsWorks()
	{

		$uri = new Uri('http://site.com.br/url/controller/method');

		$segments = $uri->getSegments();

		$expectSegs = array('url','controller','method');

		$this->assertEquals($expectSegs,$segments);

		$expect = 'controller';

		$segment = $uri->getSegments(1);

		$this->assertEquals($expect,$segment);
	}

	public function testIfSegmentsReturnFalse()
	{
		$uri = new Uri('http://site.com.br');

		$segments = $uri->getSegments(1);

		$expectSegs = false;

		$this->assertEquals($expectSegs,$segments);
	}


	public function urlsToTest()
	{

		return array(
			array('http://heartdrake.com.br/api/v1/teste',array('api','v1','teste')),
			array('http://heartdrake.com.br/api/v1/teste/vida',array('api','v1','teste','vida')),
			array('http://heartdrake.com.br/',array()),
			array('http://heartdrake.com.br',array()),
			array('http://localhost/api',array('api')),
			array(null,array())
		);
	}
}