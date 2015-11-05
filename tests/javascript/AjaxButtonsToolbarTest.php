<?php

namespace Tests\javascript;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\AjaxUnitTest;
use Ajax\bootstrap\html\base\CssRef;
/**
 * Test of Html ButtonsToolbar component
 * Class AjaxButtonsGroupTest
 */
class AjaxButtonsToolbarTest extends AjaxUnitTest {


	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		self::get("index/buttonsToolbar");
	}


	/**
	 * All elements exists on startup
	 */
	public function testHome(){
		$this->assertPageContainsText('ButtonsToolbar page');
		$this->assertTrue($this->elementExists("#btb1-buttongroups-0"));
		$this->assertTrue($this->elementExists("#btb1-buttongroups-1"));
		$this->assertTrue($this->elementExists("#btb-size-0-buttongroups-0"));
		$this->assertTrue($this->elementExists("#btb-style-0-buttongroups-0"));
	}

	/**
	 * The Style attribute is correctly set
	 */
	public function testCssClass(){
		$search = $this->getElementById('btb1-buttongroups-0-button-1');
		$this->assertContains("btn-default",$search->getAttribute("class"));
		$search = $this->getElementById('bt5');
		$this->assertContains("btn-primary",$search->getAttribute("class"));
		$search = $this->getElementById('dd1');
		$this->assertContains("btn-success",$search->getAttribute("class"));
	}

	public function testSize(){
		$search = $this->getElementById('btb2-buttongroups-0-button-1');
		$this->assertContains("btn-lg",$search->getAttribute("class"));
	}

	/**
	 * Sizes by index
	 */
	public function testSizeByIndex(){
		for($index=0;$index<4;$index++){
			$search = $this->getElementById("btb-size-".$index."-buttongroups-0-button-1");
			if(CssRef::sizes("btn")[$index]!=="")
				$this->assertContains(CssRef::sizes("btn")[$index],$search->getAttribute("class"));
		}
	}

	/**
	 * Styles by index
	 */
	public function testStylesByIndex(){
		for($index=0;$index<6;$index++){
			$search = $this->getElementById("btb-style-".$index."-buttongroups-0-button-1");
			$this->assertContains(CssRef::Styles("btn")[$index],$search->getAttribute("class"));
		}
	}

	public function testLabel(){
		$search = $this->getElementBySelector('#btb1-buttongroups-0-button-2 .label');
		$this->assertEquals("This is a label",$search->getText());
	}

	public function testBadge(){
		$search = $this->getElementBySelector('#btb1-buttongroups-0-button-1 .badge');
		$this->assertEquals("This is a badge",$search->getText());
	}

	public function testClick(){
		$search = $this->getElementById("btb1-buttongroups-0-button-1");
		$search->click();
		$this->assertContains("Bouton 1 This is a badge", $this->getElementById("message")->getText());
		$search = $this->getElementById("btb1-buttongroups-0-button-2");
		$search->click();
		$this->assertContains("Bouton 2 This is a label", $this->getElementById("message")->getText());
	}

 	public function testAddElementAndClick(){
		$search = $this->getElementById("button-tb2-4");
		$this->assertContains(CssRef::CSS_WARNING,$search->getAttribute("class"));
		$this->assertContains("Bouton ajouté : hide btb1",$search->getAttribute("value").$search->getText());
		$this->assertTrue($search->isDisplayed());
		$search->click();
		$search = $this->getElementById("btb1");
		$this->assertFalse($search->isDisplayed());
	}

	public function testAddElementGlyph(){
		$search = $this->getElementById("Button-glyph-3");
		$this->assertContains(CssRef::CSS_DEFAULT,$search->getAttribute("class"));
		$this->assertContains("Bouton Glyph 20",$search->getAttribute("value").$search->getText());
		$search=$this->getElementBySelector("#Button-glyph-3 .glyphicon");
		$this->assertContains(CssRef::glyphIcons()[20],$search->getAttribute("class"));
	}

	public function testAddElementDropdown(){
		$search = $this->getElementById("dd4");
		$search->click();
		$message=$this->getElementById("message");
		$search=$this->getElementById("dd4-dropdown-item-1");
		$search->click();
		$this->assertContains("Item1", $message->getText());
	}

}