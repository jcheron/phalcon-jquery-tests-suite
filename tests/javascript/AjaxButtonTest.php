<?php

namespace Tests\javascript;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\AjaxUnitTest;
/**
 * Test of Html Button component
 * Class AjaxButtonTest
 */
class AjaxButtonTest extends AjaxUnitTest {


	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		self::get("index/button");
	}


	/**
	 * All elements exists on startup
	 */
	public function testHome(){
	$this->assertPageContainsText('Button page');
	$this->assertTrue($this->elementExists("#bt1"));
	}

	/**
	 * The Style attribute is correctly set
	 */
	public function testCssClass(){
		$search = $this->getElementById('bt1');
		$this->assertEquals($search->getAttribute("class"),"btn btn-default");
	}

	/**
	 * Click on alert
	 */
	public function testAlertClick(){
		$search = $this->getElementById('bt1');
		$search->click();
		$message=$this->getElementById('message');
		$this->assertEquals($message->getText(), "bt1 click event");
	}
}