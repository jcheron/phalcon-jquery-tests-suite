<?php

class LoaderTest extends PHPUnit_Framework_TestCase{
	public function testNamespaces()
	{
		$loader = new Phalcon\Loader();
		$loader->registerNamespaces(array(
			"Ajax" =>'../app/library/Ajax/'
		));
		$loader->register();
		$some = new \Ajax\Jquery();
		$this->assertEquals(get_class($some), 'Ajax\Jquery',"Impossible d'instancier ");
		$loader->unregister();
	}
}