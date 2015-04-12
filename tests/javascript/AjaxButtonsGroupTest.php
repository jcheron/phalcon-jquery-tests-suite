<?php

namespace Tests\javascript;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\AjaxUnitTest;
use Ajax\bootstrap\html\base\CssRef;
/**
 * Test of Html Buttonsgroup component
 * Class AjaxButtonsGroupTest
 */
class AjaxButtonsGroupTest extends AjaxUnitTest {


	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		self::get("index/buttonsGroup");
	}


	/**
	 * All elements exists on startup
	 */
	public function testHome(){
		$this->assertPageContainsText('ButtonsGroup page');
		$this->assertTrue($this->elementExists("#bg1"));
		$this->assertTrue($this->elementExists("#bg1-button-1"));
		$this->assertTrue($this->elementExists("#bg1-button-2"));
	}

	/**
	 * The Style attribute is correctly set
	 */
	public function testCssClass(){
		$search = $this->getElementById('bg1-button-1');
		$this->assertContains("btn-default",$search->getAttribute("class"));
		$search = $this->getElementById('bg2-button-1');
		$this->assertContains("btn-info",$search->getAttribute("class"));
		$search = $this->getElementById('bg3-button-1');
		$this->assertContains("btn-primary",$search->getAttribute("class"));
	}

	public function testSize(){
		$search = $this->getElementById('bg3-button-1');
		$this->assertContains("btn-lg",$search->getAttribute("class"));
	}

	/**
	 * Sizes by index
	 */
	public function testSizeByIndex(){
		for($index=0;$index<4;$index++){
			$search = $this->getElementById('bg-size-'.$index."-button-1");
			if(CssRef::sizes("btn")[$index]!=="")
				$this->assertContains(CssRef::sizes("btn")[$index],$search->getAttribute("class"));
		}
	}

	/**
	 * Styles by index
	 */
	public function testStylesByIndex(){
		for($index=0;$index<6;$index++){
			$search = $this->getElementById('bg-style-'.$index."-button-1");
			$this->assertContains(CssRef::Styles("btn")[$index],$search->getAttribute("class"));
		}
	}

	public function testLabel(){
		$search = $this->getElementBySelector('#bg1-button-2 .label');
		$this->assertEquals("This is a label",$search->getText());
	}

	public function testBadge(){
		$search = $this->getElementBySelector('#bg1-button-1 .badge');
		$this->assertEquals("This is a badge",$search->getText());
	}

	public function testClick(){
		$search = $this->getElementById("bg1-button-1");
		$search->click();
		$this->assertContains("bg1-button-1", $this->getElementById("message")->getText());
		$search = $this->getElementById("bg1-button-2");
		$search->click();
		$this->assertContains("bg1-button-2", $this->getElementById("message")->getText());
	}

}