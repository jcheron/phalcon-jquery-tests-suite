<?php

namespace Tests\javascript;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\AjaxUnitTest;
/**
 * Test of Html Alert component
 * Class AjaxAlertTest
 */
class AjaxAlertTest extends AjaxUnitTest {


	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		self::get("index/alert");
	}


	/**
	 * All elements exists on startup
	 */
	public function testHome(){
	$this->assertPageContainsText('It works');
	$this->assertTrue($this->elementExists("#alert1"));
	$this->assertTrue($this->elementExists("#alert2"));
	$this->assertTrue($this->elementExists("#alert3"));
	$this->assertTrue($this->elementExists("#alert5"));
	$this->assertTrue($this->elementExists("#alert6"));
	}

	/**
	 * The Style attribute is correctly set
	 */
	public function testCssClass(){
		$search = $this->getElementById('alert1');
		$this->assertEquals($search->getAttribute("class"),"alert alert-success");
		$search = $this->getElementById('alert2');
		$this->assertEquals($search->getAttribute("class"),"alert alert-danger");
		$this->assertCount(2,$this->getElementsBySelector(".alert-success"));
	}

	/**
	 * Click on alert
	 */
	public function testAlertClick(){
		$search = $this->getElementById('alert1');
		$search->click();
		$btn=$this->getElementById('newButton');
		$this->assertNotNull($btn);
	}

	/**
	 * Close an alert, and generate event bs.alert.close
	 */
	public function testAlertClose(){
		$close = $this->getElementBySelector('#alert3 .close');
		$close->click();
		$message=$this->getElementById('close-message');
		$this->assertEquals($message->getText(), "Alert3 closed");
	}

	/**
	 * Adds a new alert
	 */
	public function testAddAlertOnClick(){
		$btn = $this->getElementById('btNewAlert');
		$btn->click();
		$search = $this->getElementById('alert4');
		$this->assertEquals($search->getAttribute("class"),"alert alert-warning");
	}

	/**
	 * Btn with dismiss attribute can close the alert
	 */
	public function testBtnDismiss(){
		$search = $this->getElementById('alert5');
		$this->assertEquals($search->getAttribute("class"),"alert alert-info");

		$btn = $this->getElementById('btnDismiss');
		$btn->click();
		$this->assertFalse($this->elementExists("#alert5"));
	}

	/**
	 * Close method can close alert and generate bs.alert.close event
	 */
	public function testCloseMethod(){
		$search = $this->getElementById('alert6');
		$this->assertEquals($search->getAttribute("class"),"alert alert-info");

		$btn = $this->getElementById('btCloseAlert6');
		$btn->click();
		$this->assertFalse($this->elementExists("#alert6"));
		$this->assertTrue($this->elementExists("#close-message-6"));
	}

	/**
	 * Constructs an alert from array
	 */
	public function testFromArray(){
		$search = $this->getElementById('alert7');
		$this->assertContains("alert-warning",$search->getAttribute("class"));
		$this->assertContains("Contenu de alert 7",$search->getText());
		$this->assertTrue($this->elementExists("#alert7 .close"));
		$this->assertTrue($search->isDisplayed());
		$search->click();
		$this->assertFalse($search->isDisplayed());
	}


}