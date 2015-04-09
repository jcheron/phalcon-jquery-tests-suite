<?php

class LoaderTest extends PHPUnit_Framework_TestCase{
	public function testNamespaces()
	{
		$loader = new Phalcon\Loader();
		$loader->registerNamespaces(array(
			"Ajax" => __DIR__ . '/../app/library/Ajax/'
		));
		$loader->register();
		$some = new \Ajax\JsUtils();
		$this->assertEquals(get_class($some), 'Ajax\JsUtils',"Impossible d'instancier ".$some);
		$loader->unregister();
	}
}