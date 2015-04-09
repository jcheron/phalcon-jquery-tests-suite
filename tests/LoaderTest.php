<?php

class LoaderTest extends PHPUnit_Framework_TestCase{
	public function testNamespaces()
	{
		$loader = new Phalcon\Loader();
		$loader->registerNamespaces(array(
			"Ajax" => "../app/library/Ajax/"
		));
		$loader->register();
		$some = new \Ajax\bootstrap\html\HtmlAccordion("id");
		$this->assertEquals(get_class($some), 'Ajax\bootstrap\html\HtmlAccordion');
		$loader->unregister();
	}
}