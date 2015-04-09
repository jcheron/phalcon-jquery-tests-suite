<?php

class LoaderTest extends PHPUnit_Framework_TestCase{
	public function testNamespaces()
	{
		$loader = new Phalcon\Loader();
		$loader->registerNamespaces(array(
			"Ajax" =>'../app/library/Ajax/'
		));
		$loader->register();
		$some = new \Ajax\Foo2();
		$this->assertEquals(get_class($some), 'Ajax\Foo2',"Impossible d'instancier ".$some);
		$loader->unregister();
	}
}