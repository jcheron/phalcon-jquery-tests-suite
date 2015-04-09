<?php

namespace Tests\javascript;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\AjaxUnitTest;
use Ajax\bootstrap\html\base\CssRef;
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
		$this->assertContains("btn-default",$search->getAttribute("class"));
	}

	public function testSize(){
		$search = $this->getElementById('bt11');
		$this->assertContains("btn-lg",$search->getAttribute("class"));
	}

	/**
	 * Sizes by index
	 */
	public function testSizeByIndex(){
		for($index=0;$index<4;$index++){
			$search = $this->getElementById('bt-size'.$index);
			if(CssRef::sizes("btn")[$index]!=="")
				$this->assertContains(CssRef::sizes("btn")[$index],$search->getAttribute("class"));
		}
	}

	/**
	 * Styles by index
	 */
	public function testStylesByIndex(){
		for($index=0;$index<6;$index++){
			$search = $this->getElementById('bt-'.$index);
			$this->assertContains(CssRef::Styles("btn")[$index],$search->getAttribute("class"));
		}
	}

	/**
	 * Create button from array
	 */
	public function testFromArray(){
		$search = $this->getElementById('bt8');
		$this->assertContains("btn-info",$search->getAttribute("class"));
		$this->assertContains("bt8 value",$search->getText());
	}


	/**
	 * Active and disabled states
	 */
	public function testActiveDisabled(){
		$search = $this->getElementById('bt8');
		$this->assertContains("active",$search->getAttribute("class"));
		$search = $this->getElementById('bt9');
		$this->assertContains("disabled",$search->getAttribute("class"));
	}

	/**
	 * Labels and badges
	 */
	public function testBadgeLabel(){
		$search = $this->getElementBySelector('#bt10 .label');
		$this->assertContains("label-success",$search->getAttribute("class"));
		$search = $this->getElementBySelector('#bt11 .badge');
		$this->assertEquals("I am a badge",$search->getText());
	}

	/**
	 * Click on button
	 */
	public function testButtonClick(){
		$search = $this->getElementById('bt1');
		$search->click();
		$message=$this->getElementById('message');
		$this->assertEquals($message->getText(), "bt1 click event");
	}

	/**
	 * Multiple listeners for Click on button
	 */
	public function testButtonClick2(){
		$search = $this->getElementById('bt11');
		$search->click();
		$this->assertTrue($this->elementExists('#bt12'));
		$this->assertTrue($this->elementExists('#bt13'));
	}
}