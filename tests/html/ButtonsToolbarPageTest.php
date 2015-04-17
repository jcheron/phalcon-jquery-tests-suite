<?php

namespace Tests\html;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\PhalconUnitTest;
use Ajax\bootstrap\html\HtmlButtongroups;
use Ajax\bootstrap\html\HtmlButton;
use Ajax\bootstrap\html\HtmlDropdown;
use Ajax\bootstrap\html\HtmlButtontoolbar;
/**
 * Class ButtonsToolbarPageTest
 */
class ButtonsToolbarPageTest extends PhalconUnitTest {

	public function testIndex() {
		$content=$this->application->handle("/index/buttonsToolbar")->getContent();
		$this->assertContains("btb1", $content,"ButtonsToolbar1 not ok");
		$this->assertContains("btb1-buttongroups-0-button-1", $content,"Button1 not ok");
		$this->assertContains("btb1-buttongroups-0-button-2", $content,"Button2 not ok");

		$this->assertContains("btb2", $content,"ButtonsToolbar2 not ok");
		$this->assertContains("btb2-buttongroups-0-button-1", $content,"Button1 not ok");
		$this->assertContains("btb2-buttongroups-0-button-2", $content,"Button2 not ok");

		for($index=0;$index<4;$index++){
			$this->assertContains("btb-size-".$index."-buttongroups-0", $content,"bg-size-".$index." not ok");
			$this->assertContains("btb-size-".$index."-buttongroups-0-button-1", $content,"bg-size-buttongroups-0-button-".$index."-button-1 not ok");
			$this->assertContains("btb-size-".$index."-buttongroups-0-button-2", $content,"bg-size-buttongroups-0-button-".$index."-button-2 not ok");
			$this->assertContains("btb-size-".$index."-buttongroups-0-button-3", $content,"bg-size-buttongroups-0-button-".$index."-button-3 not ok");
		}
		for($index=0;$index<6;$index++){
			$this->assertContains("btb-style-".$index."-buttongroups-0", $content,"bg-style-".$index." not ok");
			$this->assertContains("btb-style-".$index."-buttongroups-0-button-1", $content,"bg-style-buttongroups-0-button-".$index."-button-1 not ok");
			$this->assertContains("btb-style-".$index."-buttongroups-0-button-2", $content,"bg-style-buttongroups-0-button-".$index."-button-2 not ok");
			$this->assertContains("btb-style-".$index."-buttongroups-0-button-3", $content,"bg-style-buttongroups-0-button-".$index."-button-3 not ok");
		}
    }
    public function testGetElement(){
    	$btb=new HtmlButtontoolbar("btb1",array("button1","button2"));
    	$this->assertEquals($btb->getElement(0)->getElement(0), $btb->getElement(0)->getElement("btb1-buttongroups-0-button-1"));
    	$this->assertEquals($btb->getElement(0)->getElement(1), $btb->getElement(0)->getElement("btb1-buttongroups-0-button-2"));
    	$bt=new HtmlButton("bt3");
    	$btb->addElement($bt);
    }
}