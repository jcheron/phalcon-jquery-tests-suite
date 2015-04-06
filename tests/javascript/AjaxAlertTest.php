<?php

namespace Tests\javascript;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\AjaxUnitTest;
/**
 * Class UnitTest
 */
class UnitTest extends AjaxUnitTest {


	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		self::get("index/alert");
	}

	public function testHome(){
	$this->assertPageContainsText('It works');
	}

	public function testCssClass(){
		$search = $this->getElementBySelector('.alert-success');
		$this->assertEquals($search->getAttribute("class"),"alert alert-success");
		$search = $this->getElementById('alert2');
		$this->assertEquals($search->getAttribute("class"),"alert alert-danger");
		$this->assertCount(2,$this->getElementsBySelector(".alert-success"));
	}

	public function testAlertClick(){
		$search = $this->getElementById('alert1');
		$search->click();
		$btn=$this->getElementById('newButton');
		$this->assertNotNull($btn);
	}

	public function testAlertClose(){
		$close = $this->getElementBySelector('#alert3 .close');
		$close->click();
		$message=$this->getElementById('close-message');
		$this->assertEquals($message->getText(), "Alert3 closed");
	}

	public function testAddAlertOnClick(){
		$btn = $this->getElementById('btNewAlert');
		$btn->click();
		$search = $this->getElementById('alert4');
		$this->assertEquals($search->getAttribute("class"),"alert alert-warning");
	}

	public function testBtnDismiss(){
		$search = $this->getElementById('alert5');
		$this->assertEquals($search->getAttribute("class"),"alert alert-info");

		$btn = $this->getElementById('btnDismiss');
		$btn->click();
		$this->assertFalse($this->elementExists("#alert5"));
	}

	public function testCloseMethod(){
		$search = $this->getElementById('alert6');
		$this->assertEquals($search->getAttribute("class"),"alert alert-info");

		$btn = $this->getElementById('btCloseAlert6');
		$btn->click();
		$this->assertFalse($this->elementExists("#alert6"));
	}


}